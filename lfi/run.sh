docker build -t lfi .
docker run --rm -it -dp 5001:80 lfi
