# Backend com PHP puro
Fiz esse pequeno projeto exercitar as habilidades com o PHP, apesar de simples pode ser útil para quem estiver passando por um processo seletivo.

Esse projeto utilizou as tecnologias: 
> PHP 8.2, Docker e SQLite.

Para executar em sua máquina é necessário ter o docker instalado e executar os comandos abaixo (considerando que está dentro da pasta do projeto):

Gerar imagem apartir do Dockerfile
```bash
docker build -t seu_nome/nome_da_imagem .
```

Subir container:
```bash
docker run --name back_php_puro -p 8030:80 -v $(pwd):/usr/src/www
```
Caso tenha interesse em ver o processo de criação, assista no [youtube](https://youtu.be/uX3o3SiPGP0)
