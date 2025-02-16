USE real_estate;

DELIMITER $$

-- Log when a new property is inserted
CREATE TRIGGER after_property_insert
AFTER INSERT ON properties
FOR EACH ROW
BEGIN
    INSERT INTO logs (action_type, property_id, agent_id)
    VALUES ('INSERT', NEW.property_id, NEW.agent_id);
END $$

-- Prevent an agent from listing more than 3 properties
CREATE TRIGGER before_property_insert
BEFORE INSERT ON properties
FOR EACH ROW
BEGIN
    DECLARE property_count INT;
    
    SELECT COUNT(*) INTO property_count FROM properties WHERE agent_id = NEW.agent_id;
    
    IF property_count >= 3 THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Agents can only manage up to 3 properties!';
    END IF;
END $$

DELIMITER ;
