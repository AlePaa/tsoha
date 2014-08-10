INSERT INTO users (id, nick, password) VALUES
    ('1', 'admin', 'eioikeesti'),
    ('2', 'toinen', 'nummertvo'),
    ('3', 'pahis', 'rakettimies');

SELECT setval('users_id_seq', 3);

INSERT INTO tasks (user_id, id, category_id, priority_id, name, description, deadline) VALUES
    ('1','1',null,null,'Eka testi','Testataan, että taulu toimii', null);

SELECT setval('tasks_id_seq', 1);

INSERT INTO categories (user_id, id, parent, priority_id, name, description) VALUES
    ('1', '1', null, null, 'tietokantatesti', 'testidatan lisäily');

SELECT setval('categories_id_seq', 1);

INSERT INTO priorities (user_id, id, name, priovalue, description) VALUES
    ('1', '1', 'Suhtkoht oleellinen', '10', 'Ois hyvä saada tehtyy!');

SELECT setval('priorities_id_seq', 1);