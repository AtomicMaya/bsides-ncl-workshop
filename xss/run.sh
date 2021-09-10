clear
docker build -t xss .
docker run --rm -it -dp 5001:80 xss
