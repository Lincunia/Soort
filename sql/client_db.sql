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
    name_prod VARCHAR(50),
    amount SMALLINT,
    date_of_purch TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP PRIMARY KEY,
    total INT,

    id INT,
    FOREIGN KEY(id) REFERENCES client(id)
);
CREATE TABLE IF NOT EXISTS products(
    id SERIAL,
    name VARCHAR(50),
    aux_name VARCHAR(50),
    prize INT
);

INSERT INTO products(name, aux_name, prize) VALUES
('Arepa', 'arepa', 1200), 
('Empanada', 'empanada', 1200), 
('Perro caliente', 'hot-dog', 3500), 
('Pastel de pollo', 'pastry-chicken', 3500), 
('Pastel de carne', 'pastry-beaf', 3500), 
('Galletas Festival', 'festival', 800), 
('Galletas Oreo', 'oreo', 1200), 
('Bandera', 'flaggy', 800),
('Cocosette', 'cocossette', 1500),
('Papas Margarita', 'margarita', 2200),
('Dona', 'donnut', 2200),
('Almojabana', 'almojabana', 1500),
('Papas fritas', 'fries', 1600),
('Hamburguesa', 'burguer', 6000);

INSERT INTO client (id, name, level, email, amount_mon) VALUES
(1034400029, 'Agudelo Vasquez Diego Alejandro', '11A', 'agudelodiego10.a@gmail.com', 150000),
(1025141597, 'Martinez Quinche Santiago Enrique', '11A', 'msanti0274@gmail.com', 20000),
(1013587285, 'Ruiz Nausa María Alejandra', '11A', 'ruiznausamariaalejandra10a@gmail.com', 150000);
-- DECLARAR UNA COMPRA PARTICULAR
INSERT INTO shopping(name_prod, amount, total, id) VALUES
('Perro caliente', 1, 3500, 1034400029);
INSERT INTO shopping(name_prod, amount, total, id) VALUES
('Papas Margarita', 1, 2200, 1025141597);
INSERT INTO shopping(name_prod, amount, total, id) VALUES
('Arepa', 1, 3500, 1034400029);
INSERT INTO shopping(name_prod, amount, total, id) VALUES
('Galletas Festival', 3, 3600, 1013587285);
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
