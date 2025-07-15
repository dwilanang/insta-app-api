run:
	@docker compose up --build 

clean:
	@docker compose down -v

dce:
	@docker compose exec app bash

stlink:
	@php artisan storage:link

swag:
	@php artisan l5-swagger:generate

migrate-init:
	@php artisan make:migration
	
migrate:
	@php artisan migrate

model:
	@php artisan make:model

controller:
	@php artisan make:controller
	