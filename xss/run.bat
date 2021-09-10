cls
docker build -t xss .
docker run --rm -it -p 5001:80 xss