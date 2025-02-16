USE real_estate;

DELIMITER $$

-- Add a property
CREATE PROCEDURE AddProperty(
    IN p_agent_id INT,
    IN p_location VARCHAR(255),
    IN p_area INT,
    IN p_bedrooms INT,
    IN p_bathrooms INT
)
BEGIN
    INSERT INTO properties (agent_id, location, area, bedrooms, bathrooms)
    VALUES (p_agent_id, p_location, p_area, p_bedrooms, p_bathrooms);
END $$

-- Delete a property
CREATE PROCEDURE DeleteProperty(
    IN p_property_id INT
)
BEGIN
    DELETE FROM properties WHERE property_id = p_property_id;
END $$

-- Update a property
CREATE PROCEDURE UpdateProperty(
    IN p_property_id INT,
    IN p_location VARCHAR(255),
    IN p_area INT,
    IN p_bedrooms INT,
    IN p_bathrooms INT
)
BEGIN
    UPDATE properties
    SET location = p_location, area = p_area, bedrooms = p_bedrooms, bathrooms = p_bathrooms
    WHERE property_id = p_property_id;
END $$

DELIMITER ;
