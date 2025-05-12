-- Création de la table des joueurs
CREATE TABLE joueurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    score INT NOT NULL

);

-- Création de la table des parties
CREATE TABLE parties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('Longue','Courte') NOT NULL,
    joueur_id INT,
    PRIMARY KEY (joueur_id),
    FOREIGN KEY (joueur_id) REFERENCES joueurs(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) engine="InnoDB";