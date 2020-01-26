-- Table: public.emails

-- DROP TABLE public.emails;

CREATE TABLE public.emails
(
    id bigint NOT NULL DEFAULT nextval('emails_id_seq'::regclass),
    email text COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT emails_pkey PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.emails
    OWNER to postgres;