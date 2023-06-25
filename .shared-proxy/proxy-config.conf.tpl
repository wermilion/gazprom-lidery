server {
    listen 8080;

    server_name $CI_PROJECT_NAME-$CI_ENVIRONMENT_NAME.tomsk-it.ru;

    return 301 https://$host$request_uri;
}

server {
    server_name  $CI_PROJECT_NAME-$CI_ENVIRONMENT_NAME.tomsk-it.ru;
    listen 4443 ssl;

    ssl_certificate /tmp/tls/tomsk-it.ru.pem;
    ssl_certificate_key /tmp/tls/tomsk-it.ru-key.pem;

location / {
    proxy_pass http://${CI_PROJECT_NAME}-${CI_ENVIRONMENT_NAME}-front:8080;
    }

location /api/ {
    rewrite ^/api(/.*)$ $1 break;
    proxy_pass http://${CI_PROJECT_NAME}-${CI_ENVIRONMENT_NAME}-back:80;
    }
}