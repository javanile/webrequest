start:
	@docker-compose up -d
	@echo "Visit: <http://localhost:10000>

update:
	@composer update --ignore-platform-reqs