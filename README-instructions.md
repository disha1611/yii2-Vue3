# Yii2 + Vue/Vuetify Demo Setup

## Requirements
- Docker
- Node.js 18+

## Quick Start
```bash
docker-compose -f docker-compose-dev.yml up
# In separate terminals:
docker-compose exec yii2-api composer install
docker-compose exec yii2-api php yii migrate
docker-compose exec vue-app npm install