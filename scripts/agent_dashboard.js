document.addEventListener('DOMContentLoaded', function() {
    const editModal = document.getElementById('edit-modal');
    const transactionModal = document.getElementById('transaction-modal');
    const closeButtons = document.querySelectorAll('.close-button');

    // Edit Modal Logic
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const propertyCard = this.closest('.property-card');
            const propertyId = propertyCard.dataset.propertyId;

            fetch(`../backend/get_property_details.php?id=${propertyId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }
                    
                    const editForm = document.getElementById('edit-form');
                    editForm.action = `../backend/edit_property.php?id=${propertyId}`;
                    editForm.innerHTML = `
                        <input type="hidden" name="property_id" value="${data.property_id}">
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" name="location" value="${data.location}" required>
                        </div>
                        <div class="form-group">
                            <label for="area">Area (sq ft):</label>
                            <input type="number" name="area" value="${data.area}" required>
                        </div>
                        <div class="form-group">
                            <label for="bedrooms">Bedrooms:</label>
                            <input type="number" name="bedrooms" value="${data.bedrooms}" required>
                        </div>
                            <div class="form-group">
                            <label for="bathrooms">Bathrooms:</label>
                            <input type="number" name="bathrooms" value="${data.bathrooms}" required>
                        </div>
                            <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" value="${data.price}" required>
                        </div>
                        <div class="form-group">
                            <label for="images">Images (comma-separated URLs):</label>
                            <textarea name="images" rows="4">${data.images.join(', ')}</textarea>
                        </div>
                        <div class="form-actions">
                            <button type="submit">Save Changes</button>
                        </div>
                    `;
                    editModal.style.display = 'block';
                })
                .catch(error => console.error('Error fetching property details:', error));
        });
    });

    // Transaction Modal Logic
    document.querySelectorAll('.complete-transaction-btn').forEach(button => {
        button.addEventListener('click', function() {
            const propertyCard = this.closest('.property-card');
            const propertyId = propertyCard.dataset.propertyId;
            const price = propertyCard.dataset.price;
            const status = propertyCard.dataset.status;

            document.getElementById('transaction-property-id').value = propertyId;
            document.getElementById('final-amount').value = price;
            document.getElementById('transaction-type').value = (status === 'for-sale') ? 'sale' : 'rent';
            
            transactionModal.style.display = 'block';
        });
    });

    // Close modal functionality
    closeButtons.forEach(button => {
        button.onclick = function() {
            editModal.style.display = 'none';
            transactionModal.style.display = 'none';
        }
    });

    window.onclick = function(event) {
        if (event.target == editModal) {
            editModal.style.display = 'none';
        }
        if (event.target == transactionModal) {
            transactionModal.style.display = 'none';
        }
    }
});