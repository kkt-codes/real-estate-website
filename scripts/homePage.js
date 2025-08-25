document.addEventListener('DOMContentLoaded', () => {
    const featuredList = document.getElementById('featured-property-list');

    fetch('../backend/get_featured_properties.php')
        .then(response => response.json())
        .then(properties => {
            if (properties.error) {
                throw new Error(properties.error);
            }
            featuredList.innerHTML = properties.map(createPropertyCard).join('');
        })
        .catch(error => {
            console.error('Failed to fetch featured properties:', error);
            featuredList.innerHTML = '<p>Could not load properties at this time.</p>';
        });
    
    function createPropertyCard(property) {
        const image = property.images.split(',')[0];
        const price = property.status === 'for-rent'
            ? `<span class="price">$${Number(property.price).toLocaleString()}/month</span>`
            : `<span class="price">$${Number(property.price).toLocaleString()}</span>`;
        
        const status_button = property.status === 'for-rent'
            ? `<button class="btn-property-type">For Rent</button>`
            : `<button class="btn-property-type">For Sale</button>`;

        return `
            <a href="property_detail.php?id=${property.property_id}" class="property-card">
                <div class="image-container">
                    ${status_button}
                    <img src="${image}" alt="Property Image">
                </div>
                <div class="property-info">
                    ${price}
                    <p class="description">${property.short_description}</p>
                    <p class="location">
                        <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon">
                        <span>${property.location}</span>
                    </p>
                    <div class="details">
                        <div class="detail-item">
                            <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                            <span>${property.area} sqm</span>
                        </div>
                        <div class="detail-item">
                            <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bedroom icon">
                            <span>${property.bedrooms} Beds</span>
                        </div>
                        <div class="detail-item">
                            <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon">
                            <span>${property.bathrooms} Baths</span>
                        </div>
                    </div>
                </div>
            </a>
        `;
    }

    // --- Hero Search Bar Logic ---
    const searchButton = document.getElementById('hero-search-btn');

    searchButton.addEventListener('click', () => {
        const propertyType = document.getElementById('hero-property-type').value;
        const location = document.getElementById('hero-location').value;
        const maxPrice = document.getElementById('hero-max-price').value;

        // Build the query string
        const queryParams = new URLSearchParams();

        if (propertyType !== 'all') {
            queryParams.append('type', propertyType);
        }
        if (location !== 'all') {
            queryParams.append('location', location);
        }
        if (maxPrice) {
            queryParams.append('price', maxPrice);
        }

        // Redirect to the listing page with the search criteria
        window.location.href = `../pages/listing.php?${queryParams.toString()}`;
    });
});