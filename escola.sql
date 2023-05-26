turma(codigo, nome)
materia(codigo, nome, descricao, codigo_turma)
aluno(codigo, nome, cpf, sexo, codigo_turma, codigo_materia)
professor(codigo, nome, cpf, sexo, data_ativacao, codigo_turma, codigo_materia)

Create table turma(
	id integer Not Null,
	nome varchar(50) not null
);

Alter Table public.turma owner To postgres;

Create Sequence public.turma_id_seq
	AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
	
ALTER TABLE public.turma_id_seq OWNER TO postgres;

ALTER SEQUENCE public.turma_id_seq OWNED BY public.turma.id;

Create table materia(
	id integer Not Null,
	nome varchar(50) not null,
	descricao varchar(255)
);

Alter Table public.materia owner To postgres;

Create Sequence public.materia_id_seq
	AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
	
ALTER TABLE public.materia_id_seq OWNER TO postgres;

ALTER SEQUENCE public.materia_id_seq OWNED BY public.materia.id;

Create table aluno(
	id integer Not Null,
	nome Varchar(50) not null,
	cpf Varchar(11) unique,
	sexo char(1),
	codigo_turma integer,
	codigo_materia integer
);

Alter Table public.aluno owner To postgres;

Create Sequence public.aluno_id_seq
	AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
	
ALTER TABLE public.aluno_id_seq OWNER TO postgres;

ALTER SEQUENCE public.aluno_id_seq OWNED BY public.aluno.id;

Create table professor(
	id integer Not Null,
	nome Varchar(50) not null,
	cpf Varchar(11) unique,
	sexo char(1),
	codigo_materia integer
);

Alter Table public.professor owner To postgres;

Create Sequence public.professor_id_seq
	AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
	
ALTER TABLE public.professor_id_seq OWNER TO postgres;

ALTER SEQUENCE public.professor_id_seq OWNED BY public.professor.id;

ALTER TABLE ONLY public.turma ALTER COLUMN id SET DEFAULT nextval('public.turma_id_seq'::regclass);

ALTER TABLE ONLY public.materia ALTER COLUMN id SET DEFAULT nextval('public.materia_id_seq'::regclass);

ALTER TABLE ONLY public.aluno ALTER COLUMN id SET DEFAULT nextval('public.aluno_id_seq'::regclass);

ALTER TABLE ONLY public.professor ALTER COLUMN id SET DEFAULT nextval('public.professor_id_seq'::regclass);

insert into public.turma values (1,'Turma A'), (2,'Turma B');
insert into public.materia values(1, 'WEB III', 'Materia para construir paginas WEB com MVC e Frameworks'), 
(2, 'Linguagem de programação 2', 'Materia para aprendizagem de programação em Java Orientado a Objeto');
insert into public.aluno values (1, 'João', '74569874123', 'M', 1, 2),
(2, 'Maria', '78954123657', 'F', 2, 1);
insert into public.professor values (1, 'Marcio Osshiro', '45698217123', 'M', 1),
(2, 'Jefersson Velasques', '23123654123', 'M', 2);

SELECT pg_catalog.setval('public.turma_id_seq', 4, true);

SELECT pg_catalog.setval('public.materia_id_seq', 8, true);

SELECT pg_catalog.setval('public.aluno_id_seq', 5, true);

SELECT pg_catalog.setval('public.professor_id_seq', 5, true);

ALTER TABLE ONLY public.turma
    ADD CONSTRAINT turma_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.materia
    ADD CONSTRAINT materia_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.aluno
    ADD CONSTRAINT aluno_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.professor
    ADD CONSTRAINT noticia_pkey PRIMARY KEY (id);

