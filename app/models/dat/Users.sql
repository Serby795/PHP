CREATE TABLE users (
    login VARCHAR(20),
    pass VARCHAR(20),
    rol TINYINT
);

INSERT INTO users VALUES ('admin', 'admin', 1);
INSERT INTO users VALUES ('marius', 'marius', 0);