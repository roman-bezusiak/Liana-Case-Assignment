/*
    This SQL file allows to create 'email_db'
    database with table 'emails' and its columns
    being:
        bigserial PK NN 'id'
        text NN 'local_part'
        text[] NN 'domains'

    Disables native OIDs (for old versions of PSQL).
    Sets owner to 'postgres'.

    EXAMPLE:
        Original email: "jeff.jefferson@mail.com"
        local_part: "jeff.jefferson"
        domains: "{'mail', 'com'}"

    This approach was used in order to optimize
    data storage utilization, so redundant and
    repetitive data (such as '@' sign between
    'local part' and 'domains' part; '.' in 'domains'
    part)  would not take extra space.
*/

CREATE DATABASE email_db;

CREATE TABLE public.emails (
    /*
        Main table primary key
        Allows to create maximum 9223372036854775807 rows

        Modifiers:
            NOT NULL
            PRIMARY KEY
    */
    id bigserial NOT NULL PRIMARY KEY,
    
    /*
        Stores local-part of the email address
        (text before '@' sign) for data storage
        optimization

        Modifiers:
            NOT NULL
    */
    local_part text NOT NULL,

    /*
        Stores the domains of the email address
        (texts after '@' sign without '.' delimeters)
        for data storage optimization

        Modifiers:
            NOT NULL
    */
    domains text[] NOT NULL,
)

WITH (
    OIDS = FALSE
);

ALTER TABLE public.emails
    OWNER to postgres;