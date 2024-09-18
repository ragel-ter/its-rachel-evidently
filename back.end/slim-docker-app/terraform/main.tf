provider "aws" {
  region = "us-west-1"
}

resource "aws_ecr_repository" "app" {
  name = "slim-docker-app"
}

resource "aws_ecs_cluster" "main" {
  name = "slim-docker-app-cluster"
}

resource "aws_ecs_task_definition" "app" {
  family                   = "slim-docker-app-task"
  network_mode             = "awsvpc"
  requires_compatibilities = ["FARGATE"]
  cpu                      = 256
  memory                   = 512

  container_definitions = jsonencode([{
    name  = "slim-docker-app"
    image = "${aws_ecr_repository.app.repository_url}:latest"
    portMappings = [{
      containerPort = 80
      hostPort      = 80
    }]
  }])
}

# Add more resources: ECS service, ALB, security groups, etc.
