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
-[] set up sveltekit application
-[] configure docker container build
-[] configure build and deploy
-[] implement home page
-[] implement CV component
-[] test with mock data
-[] integrate with backend CV data endpoints
-[] test integration
-[] integrate with serverless CV download function
-[] test integration
-[] test deployment triggers

##### backend
-[] set up php slim application
-[] configure docker container build
-[] configure build and deploy
-[] implement backend endpoints for CV data CRUD
-[] black box api test
-[] test deployment triggers

##### serverless functions
-[] create lambda config
-[] create api gateway config
-[] create PDF download function
-[] configure function container build
-[] configure build and deploy
-[] black box test api test
-[] test deployment triggers

##### e2e integration test
-[] test accessing site
    -[] does the data load as expected
-[] test CV download
    -[] does clicking the CV download button cause the CV to download

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

