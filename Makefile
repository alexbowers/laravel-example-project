build-nginx:
	docker image build -f resources/ops/docker/nginx/Dockerfile -t laravel-example-project-nginx:latest --target nginx .

build-fpm:
	docker image build -f resources/ops/docker/fpm/Dockerfile -t laravel-example-project-fpm:latest --target fpm .
