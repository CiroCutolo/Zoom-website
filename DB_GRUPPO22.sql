PGDMP  '    1                |            gruppo22    16.1    16.1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16430    gruppo22    DATABASE     {   CREATE DATABASE gruppo22 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Italian_Italy.1252';
    DROP DATABASE gruppo22;
                www    false            �            1259    16465    biglietti_acquistati    TABLE     �   CREATE TABLE public.biglietti_acquistati (
    nome text NOT NULL,
    cognome text NOT NULL,
    validita date NOT NULL,
    prezzo double precision NOT NULL,
    tipologia text NOT NULL,
    utente text NOT NULL,
    id_biglietto integer NOT NULL
);
 (   DROP TABLE public.biglietti_acquistati;
       public         heap    www    false            �            1259    16464 %   biglietti_acquistati_id_biglietto_seq    SEQUENCE     �   CREATE SEQUENCE public.biglietti_acquistati_id_biglietto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 <   DROP SEQUENCE public.biglietti_acquistati_id_biglietto_seq;
       public          www    false    217            �           0    0 %   biglietti_acquistati_id_biglietto_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE public.biglietti_acquistati_id_biglietto_seq OWNED BY public.biglietti_acquistati.id_biglietto;
          public          www    false    216            �            1259    16431    utenti    TABLE     �   CREATE TABLE public.utenti (
    nome text NOT NULL,
    cognome text NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    data_di_nascita date NOT NULL
);
    DROP TABLE public.utenti;
       public         heap    www    false            T           2604    16468 !   biglietti_acquistati id_biglietto    DEFAULT     �   ALTER TABLE ONLY public.biglietti_acquistati ALTER COLUMN id_biglietto SET DEFAULT nextval('public.biglietti_acquistati_id_biglietto_seq'::regclass);
 P   ALTER TABLE public.biglietti_acquistati ALTER COLUMN id_biglietto DROP DEFAULT;
       public          www    false    217    216    217            �          0    16465    biglietti_acquistati 
   TABLE DATA           p   COPY public.biglietti_acquistati (nome, cognome, validita, prezzo, tipologia, utente, id_biglietto) FROM stdin;
    public          www    false    217   �       �          0    16431    utenti 
   TABLE DATA           Q   COPY public.utenti (nome, cognome, email, password, data_di_nascita) FROM stdin;
    public          www    false    215   �       �           0    0 %   biglietti_acquistati_id_biglietto_seq    SEQUENCE SET     U   SELECT pg_catalog.setval('public.biglietti_acquistati_id_biglietto_seq', 105, true);
          public          www    false    216            X           2606    16472 .   biglietti_acquistati biglietti_acquistati_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.biglietti_acquistati
    ADD CONSTRAINT biglietti_acquistati_pkey PRIMARY KEY (id_biglietto);
 X   ALTER TABLE ONLY public.biglietti_acquistati DROP CONSTRAINT biglietti_acquistati_pkey;
       public            www    false    217            V           2606    16437    utenti utenti_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.utenti
    ADD CONSTRAINT utenti_pkey PRIMARY KEY (email);
 <   ALTER TABLE ONLY public.utenti DROP CONSTRAINT utenti_pkey;
       public            www    false    215            Y           2606    16473 5   biglietti_acquistati biglietti_acquistati_utenti_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.biglietti_acquistati
    ADD CONSTRAINT biglietti_acquistati_utenti_fkey FOREIGN KEY (utente) REFERENCES public.utenti(email);
 _   ALTER TABLE ONLY public.biglietti_acquistati DROP CONSTRAINT biglietti_acquistati_utenti_fkey;
       public          www    false    4694    217    215            �      x������ � �      �   �   x�eͻ�0 ��<��4a�XP���B\�TS-�V��ӫ������ꡕ�`��K0�����*&$<�
�Nkcd�rB��Qu���dJ.��Yuk/�K��e�,�4�)�GJ�T�`�G�;ȳ�\+fJ�������H9�9YG�	�aJx�f�����S�l�Mѯ	�G�͟f�^�RʿP���eYo��Dj     