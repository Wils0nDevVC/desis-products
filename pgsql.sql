BEGIN;

-- Tabla bodegas
CREATE TABLE IF NOT EXISTS bodegas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla sucursales
CREATE TABLE IF NOT EXISTS sucursales (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    bodega_id INT NOT NULL,
    FOREIGN KEY (bodega_id) REFERENCES bodegas(id) ON DELETE CASCADE
);

-- Tabla monedas
CREATE TABLE IF NOT EXISTS monedas (
    id SERIAL PRIMARY KEY,
    codigo VARCHAR(10) NOT NULL,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla productos
CREATE TABLE IF NOT EXISTS productos (
    id SERIAL PRIMARY KEY,
    codigo VARCHAR(15) NOT NULL UNIQUE CHECK (LENGTH(codigo) BETWEEN 5 AND 15),
    nombre VARCHAR(50) NOT NULL CHECK (LENGTH(nombre) BETWEEN 2 AND 50),
    bodega_id INT NOT NULL,
    sucursal_id INT NOT NULL,
    moneda_id INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL CHECK (precio >= 0),
    descripcion TEXT NOT NULL CHECK (LENGTH(descripcion) BETWEEN 10 AND 1000),
    FOREIGN KEY (bodega_id) REFERENCES bodegas(id) ON DELETE RESTRICT,
    FOREIGN KEY (sucursal_id) REFERENCES sucursales(id) ON DELETE RESTRICT,
    FOREIGN KEY (moneda_id) REFERENCES monedas(id) ON DELETE RESTRICT
);

-- Tabla materiales
CREATE TABLE IF NOT EXISTS materiales (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla intermedia productos_materiales para la relación muchos a muchos
CREATE TABLE IF NOT EXISTS productos_materiales (
    producto_id INT NOT NULL,
    material_id INT NOT NULL,
    PRIMARY KEY (producto_id, material_id),
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE,
    FOREIGN KEY (material_id) REFERENCES materiales(id) ON DELETE CASCADE
);

-- Insertar datos en la tabla bodegas
INSERT INTO bodegas (nombre) VALUES 
('Bodega 1'),
('Bodega 2'),
('Bodega 3')
ON CONFLICT DO NOTHING;

-- Insertar datos en la tabla sucursales
INSERT INTO sucursales (nombre, bodega_id) VALUES 
('Sucursal Centro', 1),
('Sucursal Norte', 1),
('Sucursal Este', 2),
('Sucursal Oeste', 2),
('Sucursal Sur', 3),
('Sucursal Este Sur', 3)
ON CONFLICT DO NOTHING;

-- Insertar datos en la tabla monedas
INSERT INTO monedas (codigo, nombre) VALUES 
('PEN', 'SOLES'),
('USD', 'DOLARES')
ON CONFLICT DO NOTHING;

-- Insertar datos en la tabla materiales
INSERT INTO materiales (nombre) VALUES 
('Plástico'),
('Madera'),
('Metal'),
('Vidrio'),
('Textil')
ON CONFLICT DO NOTHING;

COMMIT;
