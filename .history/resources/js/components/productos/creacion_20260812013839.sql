CREATE TABLE marcas (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NULL,
    activo BOOLEAN NOT NULL DEFAULT TRUE,

    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    UNIQUE KEY uk_marcas_nombre (nombre)
);

----categorias
CREATE TABLE categorias (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NULL,
    activo BOOLEAN NOT NULL DEFAULT TRUE,

    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    UNIQUE KEY uk_categorias_nombre (nombre)
);
---------producto
CREATE TABLE productos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    codigo VARCHAR(50) NOT NULL,
    nombre VARCHAR(150) NOT NULL,

    descripcion TEXT NULL,

    marca_id BIGINT UNSIGNED NULL,
    categoria_id BIGINT UNSIGNED NULL,

    precio_compra DECIMAL(12,2) NOT NULL DEFAULT 0,
    precio_venta DECIMAL(12,2) NOT NULL DEFAULT 0,

    stock INT NOT NULL DEFAULT 0,
    stock_minimo INT NOT NULL DEFAULT 0,

    unidad_medida VARCHAR(30) NOT NULL DEFAULT 'unidad',

    imagen VARCHAR(255) NULL,

    activo BOOLEAN NOT NULL DEFAULT TRUE,

    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_productos_marca
        FOREIGN KEY (marca_id)
        REFERENCES marcas(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,

    CONSTRAINT fk_productos_categoria
        FOREIGN KEY (categoria_id)
        REFERENCES categorias(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,

    UNIQUE KEY uk_productos_codigo (codigo),

    INDEX idx_productos_nombre (nombre),
    INDEX idx_productos_marca (marca_id),
    INDEX idx_productos_categoria (categoria_id),
    INDEX idx_productos_activo (activo)
);

--imagenes
CREATE TABLE productos_imagenes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ruta_storage VARCHAR(200) NOT NULL,
    producto_id BIGINT UNSIGNED NOT NULL,
    orden INT DEFAULT 0,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (producto_id)
        REFERENCES productos(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
------
INSERT INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `marca_id`, `categoria_id`, `precio_compra`, `precio_venta`, `stock`, `stock_minimo`, `unidad_medida`, `imagen`, `activo`, `created_at`, `updated_at`) VALUES (NULL, '12312ads', 'cabezal', NULL, '5', '2', '0.00', '0.00', '0', '0', NULL, NULL, '1', current_timestamp(), current_timestamp());
