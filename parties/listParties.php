










<!--

POUR RECUPERER LES JOUEURS ET LEURS PARTIES

SELECT 
    p.id AS partie_id,
    p.lineup,
    p.type,
    p.created_at,
    GROUP_CONCAT(CONCAT(j.prenom, ' ', j.nom) SEPARATOR ', ') AS joueurs
FROM parties p
JOIN joueur_partie jp ON p.id = jp.partie_id
JOIN joueurs j ON jp.joueur_id = j.id
GROUP BY p.id, p.lineup, p.type, p.created_at
ORDER BY p.created_at DESC;