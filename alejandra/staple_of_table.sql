CREATE DATABASE great_brother;
USE great_brother;
CREATE TABLE IF NOT EXISTS students(
    id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(100),
    -- PRIMARY KEY (id, name)
    PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS parents(
    email VARCHAR(100),
    password VARCHAR(100),

    students_id INT,
    FOREIGN KEY(students_id) REFERENCES students(id)
);
CREATE TABLE IF NOT EXISTS shopping(
    name_prod VARCHAR(50),
    date_of_purch DATETIME DEFAULT CURRENT_TIMESTAMP,
    amount_mon INT,

    name_student VARCHAR(100)
    /*
    I got no success on doing a foreign key
    FOREIGN KEY(name_student) REFERENCES students(name)
    */
);
CREATE TABLE IF NOT EXISTS products(
    name VARCHAR(50),
    prize INT
);

INSERT INTO products(name, prize) VALUES
('papas_margarita', 2500),
('galletas_oreo', 1200),
('jugo_hit', 3200),
('empanada', 1200),
('arepa', 1200),
('perro_caliente', 4500),
('hamburguesa', 6500),
('salchipapas', 5000),
('gomitas', 2500),
('carne_desmechada_con_arepa', 8500),
('jugo_cifrut', 1200),
('waffle', 5000),
('helado', 2500),
('pastel_de_pollo', 3500),
('6_de_chao', 1000),
('arroz_con_leche', 3000),
('ensalda_de_frutas', 3500),
('chorizo', 4000),
('arepa_con_jamon_y_queso', 3500),
('dona', 3500),
('palito_de_queso', 3000),
('agua_grande', 3200),
('agua_pequeña', 1200),
('galletas_milo', 800),
('galletas_milo_grandes', 1200),
('muuu', 1500),
('chocolatina_jet', 2500),
('chocolatina_jumbo', 3000),
('chocolatina_jumbo_flow', 2500),
('chocostop', 2000),
('mr_tea', 3200),
('pepsi', 1200);

INSERT INTO students(id, name, password) VALUES
(1034400029, 'Diego Alejandro Agudelo Vasquez', '12345Dieguito'),
(1025141597, 'Martinez Quinche Santiago Enrique', 'no_tan_dificl'),
(1013097421, 'Perdomo Velasquez Sebastian', 'im_not_your_boyfriend');

INSERT INTO parents(students_id, email, password) VALUES
(1034400029, 'agudelodiego10.a@gmail.com', 'its_just_a_burning_memory'),
(1025141597, 'msanti0274@gmail.com', 'no_tan_dificl'),
(1013097421, 'perdomovelasquezsebastian10c@gmail.com', 'without_you_i_will_die');
