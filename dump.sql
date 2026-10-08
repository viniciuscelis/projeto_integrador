--
-- PostgreSQL database dump
--

\restrict 5ZnUYukskf5AwsqTyMFKJFS5KEaVDbb9QkajymKyLWvb39gaRaGktLnf8oU9R5p

-- Dumped from database version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
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
-- Name: produtos; Type: TABLE; Schema: public; Owner: padaria
--

CREATE TABLE public.produtos (
    id integer NOT NULL,
    nome character varying(50) NOT NULL,
    codigo character varying(15) NOT NULL,
    categoria character varying(30) NOT NULL,
    preco numeric(10,2) NOT NULL,
    quantidade_estoque numeric(10,3) NOT NULL
);


ALTER TABLE public.produtos OWNER TO padaria;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: padaria
--

CREATE SEQUENCE public.produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produtos_id_seq OWNER TO padaria;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: padaria
--

ALTER SEQUENCE public.produtos_id_seq OWNED BY public.produtos.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: padaria
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(50) NOT NULL,
    senha character varying(255) NOT NULL,
    atribuicao character varying(10) NOT NULL
);


ALTER TABLE public.usuarios OWNER TO padaria;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: padaria
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO padaria;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: padaria
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: produtos id; Type: DEFAULT; Schema: public; Owner: padaria
--

ALTER TABLE ONLY public.produtos ALTER COLUMN id SET DEFAULT nextval('public.produtos_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: padaria
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: padaria
--

COPY public.produtos (id, nome, codigo, categoria, preco, quantidade_estoque) FROM stdin;
2	Pão de Queijo	102	Salgados	3.50	45.000
3	Bolo de Cenoura	103	Bolos	28.00	6.000
4	Croissant Tradicional	104	Salgados	8.50	3.000
5	Farinha de Trigo Especial (KG)	201	Insumos	5.20	50.500
6	Café Espresso	301	Bebidas	6.00	80.000
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: padaria
--

COPY public.usuarios (id, nome, senha, atribuicao) FROM stdin;
1	dono	$2y$12$O9Fr.HZyh74BT9f4z9rG/ulNrEETHIKR3Df.9zNNOlYGDccbklceu	dono
2	funcionario	$2y$12$CEmr41GgRlM8CVp1tmWBeuFZKoOMmbXtQWnj/HgvaxMdJkjBWPAVy	empregado
3	Lucas Retamero Bortoleto	$2y$12$7pvt4SiTiWt4nOqOveTUQub9P9aXPOnYFAYGtsX1em26TluOjUbC2	empregado
\.


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: padaria
--

SELECT pg_catalog.setval('public.produtos_id_seq', 7, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: padaria
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 3, true);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: padaria
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: padaria
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

\unrestrict 5ZnUYukskf5AwsqTyMFKJFS5KEaVDbb9QkajymKyLWvb39gaRaGktLnf8oU9R5p

