cls
docker build -t fsqli .
docker run --rm -it -p 5001:80 fsqli