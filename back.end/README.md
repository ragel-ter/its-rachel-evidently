# CV Service Backend

## Development
The backend is a simple PHP Slim framework app that serves CRUD endpoints for CV data

### Run

To run the development environment:

```bash
sh run-dev.sh
```

### API

The API provides the following endpoints:

- `GET /v1/cv`: List all CVs
- `POST /v1/cv/create`: Create a new CV
- `GET /v1/cv/{id}`: Get a specific CV
- `PUT /v1/cv/{id}`: Update a specific CV
- `DELETE /v1/cv/{id}`: Delete a specific CV

### Container Config

The application uses Docker for containerization. The main configuration files are:

- `docker-compose.yml`: Defines the services (app and web)
- `Dockerfile`: Specifies the PHP environment setup
- `nginx.conf`: Configures the Nginx web server

### Database

The application uses MySQL as the database. Database migrations are managed using Phinx. The database configuration can be found in the `phinx.php` file.

### Deployment

The application is set up for easy deployment using Docker. To deploy:

1. Ensure Docker and Docker Compose are installed on your system.
2. Set up your environment variables in a `.env` file.
3. Run the `run-dev.sh` script to build and start the containers.

For production deployment, additional security measures and optimizations should be implemented.