CREATE TABLE client(
    id INT,
    name VARCHAR(100) PRIMARY KEY,
    level VARCHAR(3),
    email VARCHAR(100),
    amount_mon INT
);
CREATE TABLE compra(
    name_prod VARCHAR(50),
    amount SMALLINT,
    date_of_purch TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP PRIMARY KEY,
    total INT,

    name VARCHAR(100),
    FOREIGN KEY(name) REFERENCES client(name)
);
CREATE TABLE dips(
    addition VARCHAR(50),
    sauce VARCHAR(50),

    date_of_purch TIMESTAMP,
    FOREIGN KEY(date_of_purch) REFERENCES compra(date_of_purch)
);
CREATE TABLE products(
    id SERIAL,
    name VARCHAR(50)
);

INSERT INTO products(name) VALUES ('Arepa'), 
('Empanada'), 
('Perro caliente'), 
('Pastel de pollo'), 
('Pastel de carne'), 
('Galletas Festival'), 
('Galletas Oreo'), 
('Bandera'),
('Cocosette'),
('Papas Margarita'),
('Dona'),
('Almojabana'),
('Papas fritas'),
('Hamburguesa');

INSERT INTO client (id,
    name,
    level,
    email,
    amount_mon)
VALUES (1034400029,
    'Agudelo Vasquez Diego Alejandro',
    '11A',
    'agudelodiego10.a@gmail.com',
    150000);
INSERT INTO client (id,
    name,
    level,
    email,
    amount_mon)
VALUES (1013587285,
    'Ruiz Nausa María Alejandra', '11A',
    'ruiznausamariaalejandra10a@gmail.com',
    150000);
-- DECLARAR UNA COMPRA PARTICULAR
INSERT INTO compra(name_prod,
    amount,
    total,
    name,
    dips)
VALUES ('Perro caliente',
    1,
    3500,
    'Agudelo Vasquez Diego Alejandro',
    true);

DO $$
    DECLARE
    no_h timestamp:=(SELECT date_of_purch FROM compra WHERE name='Agudelo Vasquez Diego Alejandro' AND total=3500 AND name_prod='Arepa');
BEGIN
    INSERT INTO dips(date_of_purch,
	addition,
	sauce)
    VALUES (no_h,
	'papas',
	'Ketchup Rosada Piña');
END $$;

INSERT INTO compra(name_prod,
    amount,
    total,
    name)
VALUES ('Arepa',
    1,
    3500,
    'Agudelo Vasquez Diego Alejandro');

INSERT INTO compra(name_prod,
    amount,
    total,
    name)
VALUES ('Galletas Festival',
    3,
    3600,
    'Ruiz Nausa María Alejandra');
/*
INSERT INTO dips(date_of_purch,
    addition,
    sauce)
VALUES ('',
    '');
*/

SELECT * FROM client, compra, products;
