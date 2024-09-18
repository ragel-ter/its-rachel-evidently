# its-rachel-evidently
### personal CV and portfolio web app
monorepo containing frontend, backend and serverless functions 

## why this repo exists
### version control 
keep record of my evolving personal CV and portfolio web app
### show project lifecycle management
demonstrate my approach to living projects eg. planning / design / architecture / phase management / delivery etc
### show devops capabilities
demonstrate my understanding of the use of ci / cd capabilities and infrastructure as code for managing project updates and releases

## why a monorepo
### single developer
a monorepo means i can build a distributed solution that i can easily evolve into a more complex multi-service architecture without having to manage multiple repositories or deal with the complexities of coordinating multiple codebases
### leaky microservices
even the best micro-services architectures using containerisation can leak business logic and result in distributed monolith architectures; a single repository makes it easier to correct the bounded contexts when the need arises
### reader-friendly
the primary goal of this project is to showcase my approach to web development and delivery; a monorepo makes the distributed nature of a multi-service architecture more reader-friendly

## proposed solution 

### frontend
- sveltekit

### backend
- php slim
- mySQL

### serverless functions
- aws lambda (typescript)

### infrastructure
- terraform
- docker
- aws vpc
- aws route 53
- aws api gateway
- aws fargate
- aws secrets manager
- aws ecr

### external dependencies
- pdf generator library
- ui component library

## proposed high-level architecture diagram

![ProposedArchitectureWithDeliveryPhases](https://github.com/user-attachments/assets/2f4eada3-59b7-4365-ac43-46ea8faf7dee)

## proposed delivery plan

#### phase 1
##### frontend
- set up sveltekit application
- configure docker container build
- configure build and deploy
- implement home page
- implement CV component
- test with mock data
- integrate with backend CV data endpoints
- test integration
- integrate with serverless CV download function
- test integration
- test deployment triggers

##### backend
- set up php slim application
- configure docker container build
- configure build and deploy
- implement backend endpoints for CV data CRUD
- black box api test
- test deployment triggers

##### serverless functions
- create lambda config
- create api gateway config
- create PDF download function
- configure function container build
- configure build and deploy
- black box test api test
- test deployment triggers

##### e2e integration test
- test accessing site
    - does the data load as expected
- test CV download
    - does clicking the CV download button cause the CV to download

#### phase 2

[Refer to diagram](#proposed-high-level-architecture-diagram)

TO-DO:
Flesh out steps

#### phase 3 and beyond

[Refer to diagram](#proposed-high-level-architecture-diagram)

TO-DO:
Flesh out steps

## future project ideas

### substitutability
rebuild each layer (frontend, backend, serverless functions) with a different technology to demonstrate the flexibility and adaptability of the design

### white-labeling
add a feature that would allow users to create their own portfolio and CV site from this base and reskin it to suit their brand

## forking this repository

### terms of use and attribution

This project is open source and available for anyone to use, modify, and distribute under the following terms:

1. **Code Usage**: You are free to use, modify, and distribute the code in this repository for your own projects, including creating your own CV and portfolio web app.

2. **Content Attribution**: While the code is freely available, the project structure, architecture decisions, and documentation (including this README) that demonstrate the author's approach to web development and project management must be attributed to the original author if used or referenced.

3. **No Misrepresentation**: You may not use this project's structure, documentation, or planning elements to represent your own skills or approach without clear attribution to the original author.

4. **Attribution Format**: When attributing, please include the following:
   "Project structure and documentation inspired by [Your Name] (https://github.com/your-username/its-rachel-evidently)"

5. **Modifications**: You are encouraged to modify the code and content to suit your needs, but please make it clear what changes you have made compared to the original project.

By forking or using any part of this repository, you agree to these terms. If you have any questions or need clarification, please open an issue in the repository.
