document.addEventListener('DOMContentLoaded', () => {
    // DOM Elements
    const propertyList = document.getElementById("property-list");
    const propertyType = document.getElementById("propertyType");
    const statusFilter = document.getElementById("status");
    const bedroomFilter = document.getElementById("bedroom");
    const priceFilter = document.getElementById("price");
    const locationFilter = document.getElementById("location");
    const priceLabel = document.getElementById("price-label");
    const pageButtons = document.querySelectorAll(".page-btn");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");

    let currentPage = 1;
    const itemsPerPage = 9;
    let allProperties = [];

    // --- Data Fetching ---

    // Fetches all properties and checks which ones are bookmarked by the current user
    async function fetchProperties() {
        try {
            // Fetch all properties first
            const propertiesResponse = await fetch('../backend/get_properties.php');
            if (!propertiesResponse.ok) throw new Error('Network response was not ok');
            allProperties = await propertiesResponse.json();

            // Then, fetch the list of IDs for properties bookmarked by the user
            const bookmarkedResponse = await fetch('../backend/get_bookmarks.php');
            const bookmarkedIds = await bookmarkedResponse.json();

            // Add an 'isBookmarked' flag to each property object for easier checking
            allProperties.forEach(p => {
                p.isBookmarked = bookmarkedIds.includes(p.property_id.toString());
            });

            updatePropertyList();
        } catch (error) {
            console.error('Failed to fetch properties:', error);
            propertyList.innerHTML = '<p class="no-properties-message">Failed to load properties. Please try again later.</p>';
        }
    }

    // --- Card Creation ---

    // Generates the HTML for a single, interactive property card
    function createPropertyCard(property) {
        const image = property.images.split(',')[0];
        const price = property.status === 'for-rent'
            ? `<span class="price">$${Number(property.price).toLocaleString()}/month</span>`
            : `<span class="price">$${Number(property.price).toLocaleString()}</span>`;
        
        const status_button = property.status === 'for-rent'
            ? `<button class="btn-property-type">For Rent</button>`
            : `<button class="btn-property-type">For Sale</button>`;
        
        // This line is only needed for listing.js, but it's safe to have in both
        const bookmarkedClass = property.isBookmarked ? 'bookmarked' : '';
        const bookmarkIcon = property.isBookmarked ? '&#x2605;' : '&#x2606;';

        // Check which script is running to include bookmark/carousel only for listing.js
        const isListingPage = window.location.pathname.includes('listing.php');
        
        const interactiveElements = isListingPage ? `
            <button class="bookmark-btn ${bookmarkedClass}" data-property-id="${property.property_id}">${bookmarkIcon}</button>
            <button class="carousel-btn prev">&#10094;</button>
            <button class="carousel-btn next">&#10095;</button>
        ` : '';

        return `
            <div class="property-card" data-property-id="${property.property_id}" data-images="${property.images}" data-current-image-index="0">
                <div class="image-container">
                    ${status_button}
                    ${interactiveElements}
                    <img src="${image}" alt="Property Image">
                </div>
                <a href="property_detail.php?id=${property.property_id}" class="property-info-link">
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
            </div>
        `;
    }

    // --- Event Handling ---

    // Single event listener on the parent container for efficiency
    propertyList.addEventListener('click', (event) => {
        const target = event.target;

        // Logic for Carousel Arrow clicks
        if (target.classList.contains('carousel-btn')) {
            event.preventDefault(); // Stop the card's main link from being followed
            const card = target.closest('.property-card');
            const images = card.dataset.images.split(',');
            let currentIndex = parseInt(card.dataset.currentImageIndex, 10);

            if (target.classList.contains('next')) {
                currentIndex = (currentIndex + 1) % images.length;
            } else if (target.classList.contains('prev')) {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
            }

            card.dataset.currentImageIndex = currentIndex;
            const imgElement = card.querySelector('.image-container img');
            imgElement.src = images[currentIndex];
        }

        // Logic for Bookmark Button clicks
        if (target.classList.contains('bookmark-btn')) {
            event.preventDefault(); // Stop the card's main link from being followed
            const propertyId = target.dataset.propertyId;
            handleBookmark(propertyId, target);
        }
    });

    // Handles the backend communication for bookmarking
    async function handleBookmark(propertyId, button) {
        try {
            const response = await fetch('../backend/bookmark.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ property_id: propertyId })
            });

            if (response.status === 403) {
                alert('Please log in as a customer to bookmark properties.');
                window.location.href = 'loginPage.php';
                return;
            }

            const result = await response.json();
            if (result.status === 'added') {
                button.innerHTML = '&#x2605;'; // Solid star
                button.classList.add('bookmarked');
            } else if (result.status === 'removed') {
                button.innerHTML = '&#x2606;'; // Hollow star
                button.classList.remove('bookmarked');

                // If on the customer dashboard, remove the card immediately
                if (window.location.pathname.includes('customer_dashboard.php')) {
                    const cardToRemove = button.closest('.property-card');
                    if (cardToRemove) {
                        cardToRemove.remove();
                    }
                    if (propertyList.children.length === 0) {
                        propertyList.innerHTML = '<p class="no-properties-message">You have no bookmarked properties yet. You can add properties from the listing page.</p>';
                    }
                }
            }
        } catch (error) {
            console.error('Bookmark error:', error);
        }
    }

    // --- Filtering and Pagination ---
    
    // Updates the property list based on current filters and page
    function updatePropertyList() {
        let filteredProperties = allProperties.filter(p => 
            (propertyType.value === "all" || p.type === propertyType.value) &&
            (statusFilter.value === "all" || p.status === statusFilter.value) &&
            (bedroomFilter.value === "all" || p.bedrooms == bedroomFilter.value.replace('bedroom', '')) &&
            (locationFilter.value === "all" || p.location === locationFilter.value)
        );
        
        if (priceFilter.value && priceFilter.value !== 'all') {
            const price = parseInt(priceFilter.value, 10);
            if (statusFilter.value === 'for-rent') {
                if (price === 1000) filteredProperties = filteredProperties.filter(p => p.price < 1000);
                else if (price === 5000) filteredProperties = filteredProperties.filter(p => p.price >= 1000 && p.price <= 5000);
                else if (price === 5001) filteredProperties = filteredProperties.filter(p => p.price > 5000);
            } else if (statusFilter.value === 'for-sale') {
                if (price === 200000) filteredProperties = filteredProperties.filter(p => p.price < 200000);
                else if (price === 500000) filteredProperties = filteredProperties.filter(p => p.price >= 200000 && p.price <= 500000);
                else if (price === 1000000) filteredProperties = filteredProperties.filter(p => p.price > 500000 && p.price <= 1000000);
                else if (price === 1000001) filteredProperties = filteredProperties.filter(p => p.price > 1000000);
            }
        }

        if (filteredProperties.length === 0) {
            propertyList.innerHTML = '<p class="no-properties-message">No properties found matching your criteria.</p>';
            return;
        }

        const start = (currentPage - 1) * itemsPerPage;
        const paginatedProperties = filteredProperties.slice(start, start + itemsPerPage);
        
        propertyList.innerHTML = paginatedProperties.map(createPropertyCard).join("");
    }

    function updatePriceFilter() {
        priceFilter.innerHTML = ""; // Clear existing options
        priceFilter.style.display = "none";
        priceLabel.style.display = "none";

        if (statusFilter.value === "for-rent") {
            priceFilter.innerHTML = `
                <option value="all">All Prices</option>
                <option value="1000">Under $1,000/month</option>
                <option value="5000">$1,000 - $5,000/month</option>
                <option value="5001">Over $5,000/month</option>
            `;
            priceFilter.style.display = "inline-block";
            priceLabel.style.display = "inline-block";
        } else if (statusFilter.value === "for-sale") {
            priceFilter.innerHTML = `
                <option value="all">All Prices</option>
                <option value="200000">Under $200,000</option>
                <option value="500000">$200,000 - $500,000</option>
                <option value="1000000">$500,000 - $1,000,000</option>
                <option value="1000001">Over $1,000,000</option>
            `;
            priceFilter.style.display = "inline-block";
            priceLabel.style.display = "inline-block";
        }
    }
    
    // Event listeners for filters
    [propertyType, bedroomFilter, priceFilter, locationFilter].forEach(el => {
        el.addEventListener('change', () => {
            currentPage = 1;
            updatePropertyList();
        });
    });

    statusFilter.addEventListener('change', () => {
        updatePriceFilter(); // Update price options when status changes
        currentPage = 1;
        updatePropertyList();
    });

    // Pagination listeners
    pageButtons.forEach(button => {
        button.addEventListener("click", () => {
            currentPage = parseInt(button.dataset.page);
            updatePropertyList();
        });
    });

    prevBtn.addEventListener("click", () => {
        if (currentPage > 1) {
            currentPage--;
            updatePropertyList();
        }
    });

    nextBtn.addEventListener("click", () => {
        const totalPages = Math.ceil(allProperties.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updatePropertyList();
        }
    });

    // --- Pre-filter from URL Logic ---
    function applyUrlFilters() {
        const params = new URLSearchParams(window.location.search);

        const type = params.get('type');
        const location = params.get('location');
        const price = params.get('price');
        const status = params.get('status');

        if (type) {
            propertyType.value = type;
        }
        if (location) {
            locationFilter.value = location;
        } 
        if (status) {
            statusFilter.value = status;
            updatePriceFilter();
        }
        if (price) {
            updatePriceFilter();
            priceFilter.value = price;
        }
    }

    // Call the new function right before fetching properties
    applyUrlFilters();
    // Initial fetch to load the properties when the page starts
    fetchProperties();
});