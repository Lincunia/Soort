CREATE DATABASE rhythm_kitchen;
\connect rhythm_kitchen;

CREATE TABLE IF NOT EXISTS client(
    id INT PRIMARY KEY,
    name VARCHAR(100),
    level VARCHAR(3),
    email VARCHAR(100),
    amount_mon INT
);
CREATE TABLE IF NOT EXISTS shopping(
    name_prod TEXT,
    date_of_purch TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    amount_mon INT,

    id INT,
    FOREIGN KEY(id) REFERENCES client(id)
);
CREATE TABLE IF NOT EXISTS products(
    id SERIAL,
    name VARCHAR(50),
    prize INT
);

INSERT INTO products(name, aux_name, prize) VALUES
('arepa', 1200), 
('empanada', 1200), 
('perro_caliente', 3500), 
('pastel_de_pollo', 3500), 
('pastel_de_carne', 3500), 
('galletas_Festival', 800), 
('galletas_Oreo', 1200), 
('bandera',  800),
('cocosette', 1500),
('papas_Margarita', 2200),
('dona', 2200),
('almojabana', 1500),
('papas fritas', 1600),
('hamburguesa', 6000);

INSERT INTO client (id, name, level, email, amount_mon) VALUES
(1034400029, 'Agudelo Vasquez Diego Alejandro', '11A', 'agudelodiego10.a@gmail.com', 150000),
(1025141597, 'Martinez Quinche Santiago Enrique', '11A', 'msanti0274@gmail.com', 20000),
(1013587285, 'Ruiz Nausa María Alejandra', '11A', 'ruiznausamariaalejandra10a@gmail.com', 150000);
-- DECLARAR UNA COMPRA PARTICULAR
INSERT INTO shopping(name_prod, amount_mon, id) VALUES
('Perro caliente', 3500, 1034400029);
INSERT INTO shopping(name_prod, amount_mon, id) VALUES
('Papas Margarita', 2200, 1025141597);
INSERT INTO shopping(name_prod, amount_mon, id) VALUES
('Arepa', 3500, 1034400029);
INSERT INTO shopping(name_prod, amount_mon, id) VALUES
('Galletas Festival', 3600, 1013587285);
-- ACTUALIZAR USUARIO
UPDATE client SET name='Diego Agudelo',
email='dieguito@gmail.com'
WHERE id=1034400029;
-- ELIMINAR USUARIO
DELETE FROM shopping
WHERE id IN (
    SELECT id FROM client WHERE name='Diego Agudelo');

DELETE FROM client
WHERE name='Diego Agudelo';
