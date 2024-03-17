docker :=  docker-compose exec web
docker-run :=  docker-compose exec web bash -c

bash:
	$(docker) bash
seed:
	$(docker-run) "/usr/bin/php /var/www/html/artisan migrate:fresh --seed --force"
