.PHONY: help install setup dev build test clean docker-up docker-down docker-restart

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Targets:'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  %-15s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

install: ## Install all dependencies
	composer install
	npm install

setup: ## Setup the application for first time
	cp env.example .env
	php artisan key:generate
	php artisan storage:link
	php artisan migrate
	php artisan db:seed
	npm run build

dev: ## Start development server
	php artisan serve

build: ## Build assets for production
	npm run build

test: ## Run tests
	php artisan test

clean: ## Clean cache and compiled files
	php artisan cache:clear
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear
	composer dump-autoload

docker-up: ## Start Docker containers
	docker-compose up -d

docker-down: ## Stop Docker containers
	docker-compose down

docker-restart: ## Restart Docker containers
	docker-compose restart

docker-logs: ## Show Docker logs
	docker-compose logs -f

docker-shell: ## Access app container shell
	docker-compose exec app bash

docker-db: ## Access database container shell
	docker-compose exec db mysql -u root -p

docker-nginx: ## Access nginx container shell
	docker-compose exec nginx sh

docker-redis: ## Access redis container shell
	docker-compose exec redis redis-cli

docker-phpmyadmin: ## Open phpMyAdmin
	@echo "phpMyAdmin is available at: http://localhost:8080"
	@echo "Username: root"
	@echo "Password: root"

docker-mailpit: ## Open Mailpit
	@echo "Mailpit is available at: http://localhost:8025"

fresh: ## Fresh install (reset database and reinstall)
	php artisan migrate:fresh --seed

optimize: ## Optimize for production
	php artisan config:cache
	php artisan route:cache
	php artisan view:cache
	composer install --optimize-autoloader --no-dev

backup: ## Create backup
	php artisan backup:run

queue: ## Start queue worker
	php artisan queue:work

horizon: ## Start Horizon dashboard
	php artisan horizon

telescope: ## Open Telescope dashboard
	@echo "Telescope is available at: /telescope"

monitor: ## Monitor application
	@echo "Application monitoring:"
	@echo "- Mailpit: http://localhost:8025"
	@echo "- phpMyAdmin: http://localhost:8080"
	@echo "- Redis: localhost:6379"
	@echo "- App: http://localhost"

deploy: ## Deploy to production
	@echo "Deploying to production..."
	git pull origin main
	composer install --no-dev --optimize-autoloader
	php artisan migrate --force
	php artisan config:cache
	php artisan route:cache
	php artisan view:cache
	npm run build
	php artisan queue:restart
	@echo "Deployment completed!"

security: ## Run security checks
	composer audit
	php artisan route:list
	php artisan config:show

logs: ## Show application logs
	tail -f storage/logs/laravel.log

cache: ## Clear all caches
	php artisan cache:clear
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear
	php artisan optimize:clear

permissions: ## Fix file permissions
	chmod -R 775 storage bootstrap/cache
	chown -R www-data:www-data storage bootstrap/cache

update: ## Update dependencies
	composer update
	npm update

lint: ## Run code linting
	./vendor/bin/pint
	npm run lint

format: ## Format code
	./vendor/bin/pint
	./vendor/bin/php-cs-fixer fix

docs: ## Generate documentation
	php artisan docs:generate

seed: ## Seed database with test data
	php artisan db:seed

migrate: ## Run migrations
	php artisan migrate

rollback: ## Rollback migrations
	php artisan migrate:rollback

status: ## Show application status
	@echo "Application Status:"
	@echo "- Environment: $(shell php artisan env)"
	@echo "- Database: $(shell php artisan tinker --execute='echo DB::connection()->getPdo() ? "Connected" : "Not connected";')"
	@echo "- Queue: $(shell php artisan queue:work --once --timeout=1 > /dev/null 2>&1 && echo "Running" || echo "Not running")"
	@echo "- Cache: $(shell php artisan cache:has test > /dev/null 2>&1 && echo "Working" || echo "Not working")" 