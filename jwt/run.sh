docker build -t jwt .
docker run --rm -it -dp 5001:80 jwt
