# Diagram documentation
## Summary

- [Introduction](#introduction)
- [Database Type](#database-type)
- [Table Structure](#table-structure)
	- [users](#users)
	- [portfolios](#portfolios)
	- [transactions](#transactions)
- [Relationships](#relationships)
- [Database Diagram](#database-Diagram)

## Introduction

## Database type

- **Database system:** MySQL
## Table structure

### users

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **username** | VARCHAR(50) | not null , unique |  | |
| **password** | VARCHAR(255) | not null  |  | |
| **email** | VARCHAR(100) | not null , unique |  | |
| **created_at** | TIMESTAMP | not null , default: CURRENT_TIMESTAMP |  | | 


### portfolios

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **user_id** | INTEGER | not null  | portfolios_user_id_fk | |
| **quantity** | INTEGER | not null  |  | | 


### transactions

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , autoincrement |  | |
| **user_id** | INTEGER | not null  | transactions_user_id_fk | |
| **quantity** | INTEGER | not null  |  | |
| **transaction_type** | ENUM | not null  |  | |
| **price** | DECIMAL(10,2) | not null  |  | |
| **created_at** | TIMESTAMP | not null , default: CURRENT_TIMESTAMP |  | | 

#### Enums
##### transaction_type

- buy
- sell


## Relationships

- **portfolios to users**: many_to_one
- **transactions to users**: many_to_one

## Database Diagram

```mermaid
erDiagram
	portfolios ||--o{ users : references
	transactions ||--o{ users : references

	users {
		INTEGER id
		VARCHAR(50) username
		VARCHAR(255) password
		VARCHAR(100) email
		TIMESTAMP created_at
	}

	portfolios {
		INTEGER id
		INTEGER user_id
		INTEGER quantity
	}

	transactions {
		INTEGER id
		INTEGER user_id
		INTEGER quantity
		ENUM transaction_type
		DECIMAL(10,2) price
		TIMESTAMP created_at
	}
```