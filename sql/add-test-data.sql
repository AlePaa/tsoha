INSERT INTO users (id, nick, password) VALUES
    ('1', 'admin', 'eioikeesti'),
    ('2', 'toinen', 'nummertvo'),
    ('3', 'pahis', 'rakettimies');

SELECT setval('users_id_seq', 4);

INSERT INTO priorities (user_id, id, name, priovalue, description) VALUES
    ('1', '1', 'Suhtkoht oleellinen', '10', 'Ois hyvä saada tehtyy!');

SELECT setval('priorities_id_seq', 2);

INSERT INTO categories (user_id, id, priority_id, name, description) VALUES
    ('1', '1', '1', 'tietokantatesti', 'testidatan lisäily'),
    ('1', '2', '1', 'test1', 'test1'),
    ('1', '3', '1', 'test2', 'test2'),
    ('1', '4', '1', 'test3', 'test3');

SELECT setval('categories_id_seq', 5);

INSERT INTO tasks (user_id, id, priority_id, name, description, deadline) VALUES
    ('1','1', '1', 'Eka testi','Testataan, että taulu toimii', null),
    ('1','2', '1', 'Toka testi','Testataan useamman objektin haun toimivuus', null),
    ('3','3', '1', 'pahiksen oma','Pahiksillakin on omat tehtävänsä', null),
    ('2','4', '1', 'toisen oma','Ihan vaan tesmi', null);

SELECT setval('tasks_id_seq', 5);

INSERT INTO ctjuncts (category_id, task_id) VALUES
    ('1', '1'),
    ('1', '2'),
    ('2', '1'),
    ('2', '2');