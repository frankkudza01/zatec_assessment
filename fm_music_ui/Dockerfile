# Dockerfile.vue

# Use the official Node.js image as the base image
FROM node:14

# Set the working directory inside the container
WORKDIR /app

# Copy the Vue.js application files to the container
COPY . /app

# Install dependencies
RUN npm install

# Build the Vue.js application
RUN npm run build

# Expose port 8080
EXPOSE 8080

# Start the Vue.js development server
CMD ["npm", "run", "serve"]