document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const propertyId = params.get('id');

    if (!propertyId) {
        document.querySelector('.property-detail-container').innerHTML = '<h1>Property not found.</h1>';
        return;
    }

    fetch(`../backend/get_property_details.php?id=${propertyId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                throw new Error(data.error);
            }
            populatePropertyDetails(data);
        })
        .catch(error => {
            console.error('Error fetching property details:', error);
            document.querySelector('.property-detail-container').innerHTML = '<h1>Error loading property details.</h1>';
        });

    function populatePropertyDetails(property) {
        document.getElementById('property-location').textContent = property.location;
        document.getElementById('property-price').textContent = property.status === 'for-rent'
            ? `$${Number(property.price).toLocaleString()}/month`
            : `$${Number(property.price).toLocaleString()}`;
        document.getElementById('property-bedrooms').textContent = property.bedrooms;
        document.getElementById('property-bathrooms').textContent = property.bathrooms;
        document.getElementById('property-area').textContent = property.area;
        document.getElementById('property-description').innerHTML = property.description;

        // Agent Info
        document.getElementById('agent-name').textContent = property.agent_name;
        document.getElementById('agent-email').textContent = property.agent_email;

        // Form Property ID
        document.getElementById('form-property-id').value = property.property_id;

        // Image Gallery
        const mainImage = document.getElementById('main-image');
        const thumbnailContainer = document.getElementById('thumbnail-container');
        mainImage.src = property.images[0]; // Set the main image

        property.images.forEach((imgSrc, index) => {
            const thumb = document.createElement('img');
            thumb.src = imgSrc;
            thumb.alt = `Thumbnail ${index + 1}`;
            thumb.classList.toggle('active', index === 0);
            thumb.addEventListener('click', () => {
                mainImage.src = imgSrc;
                document.querySelectorAll('.thumbnail-wrapper img').forEach(t => t.classList.remove('active'));
                thumb.classList.add('active');
            });
            thumbnailContainer.appendChild(thumb);
        });
    }

    // "Schedule a Visit" button functionality
    document.getElementById('schedule-visit-btn').addEventListener('click', () => {
        document.getElementById('appointment-form-section').scrollIntoView({ behavior: 'smooth' });
    });
});