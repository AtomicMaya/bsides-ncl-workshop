clear
docker build -t fsqli .
docker run --rm -it -dp 5001:80 fsqli
