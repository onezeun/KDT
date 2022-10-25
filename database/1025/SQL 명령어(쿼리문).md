# SQL 문장 종류

## 1. 데이터 제어어 (DCL)

권한, 보안에 관련된 명령어  → GRANT, REVOKE

## 2. 데이터 정의어 (DDL)

데이터 공간에 관련된 명령어(데이터베이스, 테이블) → CREATE, ALTER, DROP, RENAME

## 3. 데이터 조작어 (DML) ⭐

(CRUD) 데이터 조작에 관련된 명령어(데이터 처리) → INSERT, UPDATE, DELETE, SELECT

자주 쓸 기본적인 명령어 7개~~

|  | NEW | EDIT | REMOVE | SEARCH |
| --- | --- | --- | --- | --- |
| DDL | CREATE | ALTER | DROP | SHOW (MySQL) |
| DML | INSERT | UPDATE | DELETE | SELECT |

---

# CREATE : 생성

문법

```sql
create database [DB명];

create table [테이블명] (
	필드명 데이터형식 제약,
	필드명 데이터형식 제약,
	필드명 데이터형식 제약,
);
```

### 1. 데이터베이스, 테이블 생성

`create database`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled.png)

`create table`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%201.png)

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%202.png)

### 2. 테이블 구조 확인

`desc [테이블명];`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%203.png)

---

# ALTER : 수정

데이터베이스, 테이블 수정 ( ADD, CHANGE, DROP, MODIFY, RENAME )

문법

```sql
alter database [DB명] 수정할 내용

alter table [테이블명] add 필드명 타입 제약 after[필드명];
```

## 데이터베이스 수정

### 1. 데이터 검색

`select * from [테이블명];`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%204.png)

> 🤔 **???로 뜨는 이유?**
한글이라서 윈도우는 인코딩이 안됨 . . .
맥은 됨
> 

### 2. 데이터베이스 수정

```sql
alter database [DB명] CHARACTER SET=문자집합이름;

alter database [DB명] COLLATE = 콜레이션이름;
```

`alter database front character set=utf8;`

`alter database front collate =utf8_general_ci;`

문자셋을 바꿨다고 해서 기존에 있던 데이터가 자동으로 바뀌진 않음..

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%205.png)

데이터 추가를 해보자

`insert into MEMBERS(U_NAME, U_ID, PWD) values('이영희', 'yhlee', '2222');`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%206.png)

사실 데이터 추가도 인코딩이 된다는 보장이 없음

⇒ 처음 데이터베이스를 만들 때 잘 만들자!

---

## 테이블 수정

문법

```sql
alter table[테이블명] ADD [필드명 데이터타입];
alter table[테이블명] DROP [필드명];
alter table[테이블명] MODIFY (COLUMN) [필드명 데이터타입];
```

### 1. ADD

`alter table notice add n_date datetime;`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%207.png)

### 2. DROP

`alter table notice drop n_date;`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%208.png)

### 3. MODIFY

`alter table notice modify column n_content text;` → column 생략 가능

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%209.png)

→ 데이터베이스에선 바꿔쓰는게 좋은게 아님. .!

처음부터 설계를 잘하자

---

# DROP : 삭제

문법

```sql
drop database [DB명];
drop table [테이블명];
```

### 1. 테이블 삭제

`drop table notice;`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2010.png)

### 2. 데이터베이스 삭제

`drop database exam;`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2011.png)

---

# 실습

: 기존 front DB 삭제, 문자셋 설정하여 처음부터 생성 해보기

### 1. DB 생성

```sql
create database [DB명] default character set [문자셋] default collate [콜레이트 이름]

---

create database front default character set utf8 default collate utf8_general_ci;
```

## 2. 테이블 생성

어제 만들었던 members 테이블 만들기

```sql
create table members(
  idx int auto_increment primary key,
  u_name varchar(20) not null,
  u_id varchar(20) not null,
  pwd varchar(20) not null
);
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2012.png)

## 3. 데이터 입력(한글 데이터 포함)

```sql
insert into members values(1, '관리자', 'admin', '1234');

insert into members(u_name, u_id, pwd) values('홍길동', 'hong', '1111');
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2013.png)

## 4. 데이터 확인(문자셋)

`select * from members;`

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2014.png)

결론~~ 문자셋 설정은 중요하다~~!

---

# 데이터 형식

## 1. 숫자 타입

MySQL은 SQL 표준에서 지원하는 모든 숫자 타입 제공

1. 정수 타입 : TINYINT, SMALLINT, MEDIUMINT, INT, BIGINT
2. 고정 소수점 타입 : DECIMAL
3. 부동 소수점 타입 : FLOAT, DOUBLE
4. 비트값 타입: BIT(0, 1)

## 2. 문자열 타입

1. CHAR(길이값) : 고정 길이 문자열
2. VARCHAR(길이값) : 가변길이 문자열
3. BINARY(길이값)
4. VARBINARY(길이값)
5. BLOB
6. TEXT : 길이값 없음, 대소문자 구분
7. ENUM : 미리 지정한 집합 안의 데이터 중에 하나만 저장
8. SET : 미리 지정한 집합 안의 데이터 중에 여러 개 동시 저장

## 3. 날짜, 시간

1. DATE
    
    - 날짜만 저장
    
    - 기본 형식 : ‘YYYY-MM-DD’
    
2. DATETIME
    
    - 날짜 & 시간
    
    - 기본 형식 : ‘YYYY-MM-DD HH:MM:SS’
    
3. DATE, DATETIME
    
    - 입력받은 데이터가 유효한 날짜와 시간이 아니면 0을 저장
    
4. TIME
    
    - 시간 저장
    
    - 기본 형식 : ‘HH:MM:SS’
    
5. YEAR
    
    - 연도 저장
    
    - YEAR(2) : 2자리 연도
    
    - 문자열 ‘0’ 또는 ‘00’ : 2000년
    

# 제약(규칙)

1. NOT NULL : 빈 값 허용 안함

2. DEFAULT : 기본값 허용

3. UNIQUE : 중복된 값 허용 안함

4. CHECK : 지정된 값만 허용

```sql
CHECK('남', '여')  --> 둘 중 하나만 값 들어올 수 있음
```

5. AUTO_INCREMENT : 자동 증가

6. PRIMARY KEY : 기본 키 설정

7. FOREIGN KEY : 참조 키 설정

---

실습 겸 . . 개념 정리!

# 테이블 설계

```sql
=======================================================
게시판 : new_members

-------------------------------------------------------
항목     | 열이름   | 데이터타입(길이)  | 제약
-------------------------------------------------------

일련번호 | idx      | int               | PK, AI
이름     | u_name   | varchar(20)       | NN
아이디   | u_id     | varchar(20)       | NN
비밀번호 | pwd      | varchar(20)       | NN
전화번호 | phone_no | varchar(15)       | NN
이메일   | email    | varchar(50)       | NN
생년월일 | birth    | date              | default 0
성별     | gender   | char(1)           | default 0
주소     | addr     | varchar(100)      | default 0

```

# 테이블 생성

```sql
create table new_members(
	idx int auto_increment primary key,
	u_name varchar(20) not null,
	u_id varchar(20) not null,
	pwd varchar(20) not null,
	phone_no varchar(15),
	email varchar(50),
	birth date, 
	gender char(1),
	addr varchar(100)
);
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2015.png)

# INSERT : 데이터 입력

## 1. 모든 필드에 데이터 입력 : 필드명 생략

문법

```sql
insert into [테이블명] values('값', '값', ...);
```

실습

```sql
insert into new_members values(1, '관리자', 'admin', '1234', '01011112222', 'admin@abc.com', '2001-10-25', '남', '서울시 강남구 역삼동');
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2016.png)

## 2. 일부 필드에 데이터 입력

문법

```sql
insert into [테이블명](필드명, 필드명, ...필드명N) values('값', '값', ...값N);
```

**주의~~** : 필드명 개수와 값의 개수가 반드시 일치해야 함

실습

```sql
insert into new_members(u_name, u_id, pwd) values('홍길동', 'hong', '1111');
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2017.png)

## 3. 전체 데이터 입력

```sql
노션에서 확인 . .
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2018.png)

# SELECT : 데이터 검색 ⭐

## 1. 단일 필드 검색

```sql
select [필드명] from [테이블명];

--

select u_name from new_members;
```

## 2. 여러 필드 검색

```sql
select [필드명], [필드명],... from [테이블명];

--

select u_name, u_id from new_members;
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2019.png)

## 3. 모든 필드 검색

```sql
select *(all) from [테이블명];

--

select * from new_members;
```

## 4. 전체 행의 개수 출력

```sql
select count(*) from [테이블명];

--

select count(*) from new_members;
```

## 5. 필드명 변경 : 출력시에만 변경

```sql
select [필드명] as [보여질 필드명]

--

select u_name as '이름' from new_members;
select count(*) as '전체 데이터' from new_members;
```

→ 아예 바꾸려면 alter 사용

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2020.png)

## 6. DISTINCT : 중복값 제외 검색

```sql
select distinct [필드명] from [테이블명];

--

select distinct gender from new_members;
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2021.png)

# WHERE : 조건절⭐

## 1. 특정 필드에서 특정한 값을 가진 전체 데이터 검색

```sql
select * from [테이블명] where [필드명=값]

--

select * from new_members where idx=34;
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2022.png)

## 2. 특정 필드에서 특정한 값을 가진 일부 데이터 검색

```sql
select [필드명], [필드명]... from [테이블명] where [필드명=값]

--

select idx, u_name, u_id from new_members where idx=34;
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2023.png)

## 3. 수정, 삭제시에도 사용

```sql
delete from new_members where idx=30
```

# SQL 연산자

## 1. 산술연산자

+, - , * ,  /

## 2. 비교 연산자

=, !=, >, <, <=, >=

## 3. 논리연산자

SQL 에서 사용 가능한 모든 논리 연산자의 목록

| 연산자 | 설명 |
| --- | --- |
| ALL | ALL 연산자는 하나의 값을 다른 값들의 집합의 모든 값들과 비교할 때 사용합니다. |
| AND | AND 연산자는 SQL 문의 WHERE 절에 여러 개의 조건이 존재할 수 있게 해줍니다. |
| ANY | ANY 연산자는 조건을 따르는 목록에 해당하는 값을 비교하기 위해 사용됩니다. |
| BETWEEN | BETWEEN 연산자는 최소값과 최대값을 지정한 값의 범위 내에 있는 값들을 검색하기 위해 사용됩니다. |
| EXISTS | EXISTS 연산자는 특정한 기준으로 구체화한 테이블에서 행이 존재하는지를 찾기 위해 사용됩니다. |
| IN | IN 연산자는 어떤 값을 구체화된 리터럴 값의 목록과 비교하기 위해 사용됩니다. |
| LIKE | LIKE 연산자는 와일드카드 연산자를 사용하여 해당 값과 유사한 값을 찾으려 할 때 사용됩니다. |
| NOT | NOT 연산자는 사용하려는 논리 연산자의 의미를 반전시킵니다. 사용 예: NOT EXISTS, NOT BETWEEN, NOT IN 등. 이 연산자가 부정 연산자입니다. |
| OR | OR 연산자는 SQL 문의 WHERE 절에서 여러 조건을 합치기 위해 사용됩니다. |
| IS NULL | NULL 연산자는 해당 값을 NULL 값과 비교할 때 사용됩니다. |
| UNIQUE | UNIQUE 연산자는 유일성을 가지도록 구체화된 테이블의 모든 행을 검색합니다. (중복 불허) |

### 1. **in : 비연속 데이터 검색 (입력된 값들만 선택)**

```sql
select [필드명] from [테이블명] where [필드명] in(값, 값, 값 ...)

--

select idx, u_name, u_id from new_members where idx in(25, 30, 35);
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2024.png)

### 2. **between A and B : 범위 검색**

```sql
select [필드명] from [테이블명] where [필드명] between A and B;

--

select idx, u_name from new_members where idx between 22 and 30;

select idx, u_name, birth from new_members where birth between '1990-01-01' and '1995-12-31';
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2025.png)

### 3. LIKE, %(all) : 문자열 검색 (NOT LIKE)

```sql
select [필드명] from [테이블명] where [필드명] like '문자열';
select [필드명] from [테이블명] where [필드명] like '문자열%';  -- 문자열로 시작하는
select [필드명] from [테이블명] where [필드명] like '%문자열';  -- 문자열로 끝나는
select [필드명] from [테이블명] where [필드명] like '%문자열%'; -- 문자열을 포함하는
select [필드명] from [테이블명] where [필드명] not like '문자열';

--

select idx, u_name, addr from new_members where addr like '%서울%';
select idx, u_name, addr from new_members where addr not like '%서울%';
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2026.png)

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2027.png)

# order by : 정렬

1. asc : 오름차순(기본값)
2. desc : 내림차순

```sql
select [필드명] from [테이블명] order by [필드명 정렬방법];
select [필드명] from [테이블명] order by [필드명 정렬방법], [필드명 정렬방법];
select [필드명] from [테이블명] where절 order by [필드명 정렬방법];

--

select idx, u_name from new_members where idx between 22 and 30 order by idx desc;

select idx, u_name, birth from new_members where birth between '1990-01-01' and '1995-12-31' order by birth;
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2028.png)

→ 검색 할 거 다 하고 마지막에 하면 됩니니당

# UPDATE : 데이터 수정

## 1. 단일 필드 수정

```sql
update [테이블명] set [수정할필드 = 수정할값];

--

update new_members set addr='서울';
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2029.png)

## 2. 여러 필드 수정

```sql
update [테이블명] set [수정할필드 = 수정할값], [수정할필드 = 수정할값]....;

--

update new_members set u_id='hong', pwd='1234';
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2030.png)

대참사라고 보면 됨

## 3. 특정 데이터 수정

```sql
update [테이블명] set [수정할필드 = 수정할값] where [필드명=값];

--

update new_members set addr='경기' where idx='22';
```

![Untitled](KDT%2044%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20a72cf0fdda214067a753beb24c9a5926/Untitled%2031.png)

# DELETE : 데이터 삭제

## 1. 모든 행 삭제

```sql
delete from [테이블명];

--

delete from new_members;
```

## 2. 특정 행 삭제

```sql
delete from [테이블명] where [필드명=값];

--

delete from new_members where idx='22';
```

---

# ✏️ 과제

1. 본인 프로젝트에 사용할 DB 테이블 설계서
2. 각 테이블 쿼리 작성

테이블 설계서_본인이름.doc

예시

```sql
EX ================================================
게시판 : board

---------------------------------------------------
항목     | 열이름     | 데이터타입(길이) | 제약
---------------------------------------------------

글번호   | idx        | int              | PK, AI
제목     | title      | varchar(100)     | NN
내용     | content    | text             | NN
작성자   | author     | varchar(20)      | NN
작성일자 | wr_date    | date             | NN
조회수   | view_count | int              | default 0

```