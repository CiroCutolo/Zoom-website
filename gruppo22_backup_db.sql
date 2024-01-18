toc.dat                                                                                             0000600 0004000 0002000 00000013056 14551736574 0014465 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        PGDMP   8    +                 |            gruppo22    16.1    16.1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false         �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false         �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false         �           1262    16430    gruppo22    DATABASE     {   CREATE DATABASE gruppo22 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Italian_Italy.1252';
    DROP DATABASE gruppo22;
                www    false         �            1259    16447 	   biglietti    TABLE     �   CREATE TABLE public.biglietti (
    codice text NOT NULL,
    prezzo double precision NOT NULL,
    tipologia text NOT NULL,
    "validità" date NOT NULL
);
    DROP TABLE public.biglietti;
       public         heap    www    false         �            1259    16439    biglietti_acquistati    TABLE     �   CREATE TABLE public.biglietti_acquistati (
    utente text NOT NULL,
    codice_biglietto text NOT NULL,
    data date NOT NULL,
    id_biglietto integer NOT NULL
);
 (   DROP TABLE public.biglietti_acquistati;
       public         heap    www    false         �            1259    16438 %   biglietti_acquistati_id_biglietto_seq    SEQUENCE     �   CREATE SEQUENCE public.biglietti_acquistati_id_biglietto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 <   DROP SEQUENCE public.biglietti_acquistati_id_biglietto_seq;
       public          www    false    217         �           0    0 %   biglietti_acquistati_id_biglietto_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE public.biglietti_acquistati_id_biglietto_seq OWNED BY public.biglietti_acquistati.id_biglietto;
          public          www    false    216         �            1259    16431    utenti    TABLE     �   CREATE TABLE public.utenti (
    nome text NOT NULL,
    cognome text NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    data_di_nascita date NOT NULL
);
    DROP TABLE public.utenti;
       public         heap    www    false         X           2604    16442 !   biglietti_acquistati id_biglietto    DEFAULT     �   ALTER TABLE ONLY public.biglietti_acquistati ALTER COLUMN id_biglietto SET DEFAULT nextval('public.biglietti_acquistati_id_biglietto_seq'::regclass);
 P   ALTER TABLE public.biglietti_acquistati ALTER COLUMN id_biglietto DROP DEFAULT;
       public          www    false    216    217    217         �          0    16447 	   biglietti 
   TABLE DATA           K   COPY public.biglietti (codice, prezzo, tipologia, "validità") FROM stdin;
    public          www    false    218       4851.dat �          0    16439    biglietti_acquistati 
   TABLE DATA           \   COPY public.biglietti_acquistati (utente, codice_biglietto, data, id_biglietto) FROM stdin;
    public          www    false    217       4850.dat �          0    16431    utenti 
   TABLE DATA           Q   COPY public.utenti (nome, cognome, email, password, data_di_nascita) FROM stdin;
    public          www    false    215       4848.dat �           0    0 %   biglietti_acquistati_id_biglietto_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('public.biglietti_acquistati_id_biglietto_seq', 1, false);
          public          www    false    216         \           2606    16446 .   biglietti_acquistati biglietti_acquistati_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.biglietti_acquistati
    ADD CONSTRAINT biglietti_acquistati_pkey PRIMARY KEY (id_biglietto);
 X   ALTER TABLE ONLY public.biglietti_acquistati DROP CONSTRAINT biglietti_acquistati_pkey;
       public            www    false    217         ^           2606    16453    biglietti biglietti_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.biglietti
    ADD CONSTRAINT biglietti_pkey PRIMARY KEY (codice);
 B   ALTER TABLE ONLY public.biglietti DROP CONSTRAINT biglietti_pkey;
       public            www    false    218         Z           2606    16437    utenti utenti_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.utenti
    ADD CONSTRAINT utenti_pkey PRIMARY KEY (email);
 <   ALTER TABLE ONLY public.utenti DROP CONSTRAINT utenti_pkey;
       public            www    false    215         _           2606    16454 ?   biglietti_acquistati biglietti_acquistati_codice_biglietto_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.biglietti_acquistati
    ADD CONSTRAINT biglietti_acquistati_codice_biglietto_fkey FOREIGN KEY (codice_biglietto) REFERENCES public.biglietti(codice) NOT VALID;
 i   ALTER TABLE ONLY public.biglietti_acquistati DROP CONSTRAINT biglietti_acquistati_codice_biglietto_fkey;
       public          www    false    218    217    4702         `           2606    16459 5   biglietti_acquistati biglietti_acquistati_utente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.biglietti_acquistati
    ADD CONSTRAINT biglietti_acquistati_utente_fkey FOREIGN KEY (utente) REFERENCES public.utenti(email) NOT VALID;
 _   ALTER TABLE ONLY public.biglietti_acquistati DROP CONSTRAINT biglietti_acquistati_utente_fkey;
       public          www    false    217    4698    215                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          4851.dat                                                                                            0000600 0004000 0002000 00000000005 14551736574 0014267 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4850.dat                                                                                            0000600 0004000 0002000 00000000005 14551736574 0014266 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4848.dat                                                                                            0000600 0004000 0002000 00000000156 14551736574 0014304 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        Gaetano	Frasca	gae.fra@gmail.com	$2y$10$TQlqsnngqekVuHzSf3A9buP6e4Ny2GCz4NkDzV9bEQlLf6RZypxIy	2002-08-27
\.


                                                                                                                                                                                                                                                                                                                                                                                                                  restore.sql                                                                                         0000600 0004000 0002000 00000012020 14551736574 0015400 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        --
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

-- Dumped from database version 16.1
-- Dumped by pg_dump version 16.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE gruppo22;
--
-- Name: gruppo22; Type: DATABASE; Schema: -; Owner: www
--

CREATE DATABASE gruppo22 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Italian_Italy.1252';


ALTER DATABASE gruppo22 OWNER TO www;

\connect gruppo22

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: biglietti; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.biglietti (
    codice text NOT NULL,
    prezzo double precision NOT NULL,
    tipologia text NOT NULL,
    "validità" date NOT NULL
);


ALTER TABLE public.biglietti OWNER TO www;

--
-- Name: biglietti_acquistati; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.biglietti_acquistati (
    utente text NOT NULL,
    codice_biglietto text NOT NULL,
    data date NOT NULL,
    id_biglietto integer NOT NULL
);


ALTER TABLE public.biglietti_acquistati OWNER TO www;

--
-- Name: biglietti_acquistati_id_biglietto_seq; Type: SEQUENCE; Schema: public; Owner: www
--

CREATE SEQUENCE public.biglietti_acquistati_id_biglietto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.biglietti_acquistati_id_biglietto_seq OWNER TO www;

--
-- Name: biglietti_acquistati_id_biglietto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: www
--

ALTER SEQUENCE public.biglietti_acquistati_id_biglietto_seq OWNED BY public.biglietti_acquistati.id_biglietto;


--
-- Name: utenti; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.utenti (
    nome text NOT NULL,
    cognome text NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    data_di_nascita date NOT NULL
);


ALTER TABLE public.utenti OWNER TO www;

--
-- Name: biglietti_acquistati id_biglietto; Type: DEFAULT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.biglietti_acquistati ALTER COLUMN id_biglietto SET DEFAULT nextval('public.biglietti_acquistati_id_biglietto_seq'::regclass);


--
-- Data for Name: biglietti; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.biglietti (codice, prezzo, tipologia, "validità") FROM stdin;
\.
COPY public.biglietti (codice, prezzo, tipologia, "validità") FROM '$$PATH$$/4851.dat';

--
-- Data for Name: biglietti_acquistati; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.biglietti_acquistati (utente, codice_biglietto, data, id_biglietto) FROM stdin;
\.
COPY public.biglietti_acquistati (utente, codice_biglietto, data, id_biglietto) FROM '$$PATH$$/4850.dat';

--
-- Data for Name: utenti; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.utenti (nome, cognome, email, password, data_di_nascita) FROM stdin;
\.
COPY public.utenti (nome, cognome, email, password, data_di_nascita) FROM '$$PATH$$/4848.dat';

--
-- Name: biglietti_acquistati_id_biglietto_seq; Type: SEQUENCE SET; Schema: public; Owner: www
--

SELECT pg_catalog.setval('public.biglietti_acquistati_id_biglietto_seq', 1, false);


--
-- Name: biglietti_acquistati biglietti_acquistati_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.biglietti_acquistati
    ADD CONSTRAINT biglietti_acquistati_pkey PRIMARY KEY (id_biglietto);


--
-- Name: biglietti biglietti_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.biglietti
    ADD CONSTRAINT biglietti_pkey PRIMARY KEY (codice);


--
-- Name: utenti utenti_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.utenti
    ADD CONSTRAINT utenti_pkey PRIMARY KEY (email);


--
-- Name: biglietti_acquistati biglietti_acquistati_codice_biglietto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.biglietti_acquistati
    ADD CONSTRAINT biglietti_acquistati_codice_biglietto_fkey FOREIGN KEY (codice_biglietto) REFERENCES public.biglietti(codice) NOT VALID;


--
-- Name: biglietti_acquistati biglietti_acquistati_utente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.biglietti_acquistati
    ADD CONSTRAINT biglietti_acquistati_utente_fkey FOREIGN KEY (utente) REFERENCES public.utenti(email) NOT VALID;


--
-- PostgreSQL database dump complete
--

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                