# Development stage
FROM node:18.16-alpine3.17 as develop-stage
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .

# Build stage
FROM develop-stage as build-stage
EXPOSE 3000
CMD ["node", "index.js"]