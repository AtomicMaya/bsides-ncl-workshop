cls
docker build -t web .
docker run --rm -it -p 8080:80 web