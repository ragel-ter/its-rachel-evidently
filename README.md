# its-rachel-evidently
monorepo containing frontend, backend and serverless functions for a personal CV and portfolio website

### why this repo exists
- version control for the my evolving personal CV and portfolio website
- demonstration of my approach to living projects eg. planning / design / architecture / phase management / delivery etc
- demonstration of my understanding of the use of ci / cd capabilities for managing project updates and release

### why a monorepo
- i'm a single developer and the intention with this project is to use deployment containers as service boundaries; even though i intend to build this project with at least one frontend framework, a CRUD backend based on ReST and some serverless functionality, i don't need individual repositories to enforce those boundaries if the containers are correctly configured
- even the best micro-services architectures using containerisation can leak business logic and result in distributed monolith architectures; when this occurs the physical boundaries created by separately owned and managed repositories can make correcting the bounded contexts more challenging than if all the services where in the same repo - until such time as a service is wholely owned by an independent team whose 
- a monorepo makes distributed solutions reader-friendly which - given that the primary goal of this project is to showcase my approach to web development and delivery - is more desirable

![ProposedArchitectureWithDeliveryPhases](https://github.com/user-attachments/assets/2f4eada3-59b7-4365-ac43-46ea8faf7dee)
