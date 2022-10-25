-- 테이블 생성
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

-- 모든 필드에 데이터 입력 : 필드명 생략
insert into new_members values(1, '관리자', 'admin', '1234', '01011112222', 'admin@abc.com', '2001-10-25', '남', '서울시 강남구 역삼동');

-- 일부 필드에 데이터 입력
insert into new_members(u_name, u_id, pwd) values('홍길동', 'hong', '1111');

-- 전체 데이터 입력
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('김태연', 'taeyeon', 'ty1234', '01012340147', 'taeyeon01@naver.com', '1989-03-09', '여', '전라북도 전주시 평화동');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('리누스', 'Linux', '1q2w3e', '01025559999' 'linux@github.com', '1971-08-25', '남', '부산광역시 해운대구');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('박보영', ' parkbo0123', 'park6789!','01056567878','parkbo0123@naver.com','1986-05-05','여','경기 성남시 분당구');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('예지','dbekcks','1026','01012345678','dbekcks@naver.com','2000-05-26','여','주소(서울특별시/성동구/성수동)');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('이지은' 'iuiu' '5252' '01012341234' 'iiuu@naver.com' '1993-05-16' '여' '경기도 광주군 광주읍 송정리');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('김길동','kildong1004','kildong1004!','kildong1004@gmail.com','1961-01-03','남','서울시 서대문구 서대문로 1가 1층 파란지붕집');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('기성용', 'kiki6', '1234', '01012341234', 'ki6@naver.com', '1990-06-06', 'M', '서울시 강남구');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('anomalie' , 'anomalie1' , '1234' , 'anomalie@google.co.kr' , '1993-10-24' ,'male' , '서울특별시 마포구 연남동');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('바나나킥', 'banana', '5662', '01057023342', 'banana@naver.com', '1995-04-20', '여', '성남시 분당구 백현동');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('황민현','optimushwang','0809','01088889999','optimushwang@gmail.com', '1995-08-09', '남','부산광역시 수영구');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('김강남','gangnam','gangnam123','01076546543','gangnam@naver.com','1999-09-09','남','서울특별시 강남구');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('김연아', 'yunakim', '221022', '01020140221', 'yunakim@gmail.com', '1990-09-05', '여', '서울시 용산구');
insert into new_members(u_name, u_id, pwd, phone_no, email, birth, gender, addr) values('둘리', 'dool2', 'd2d2!@', '025727896', 'dool2@gmail.com', '1983-04-25', '남', '부천시 원미구 상1동 412-3번지 둘리의 거리');


-- SELECT : 데이터 검색

-- 1. 단일필드검색
select u_name from new_members;

-- 2. 여러필드 검색
select u_name, u_id from new_members

-- 3. 모든 필드 검색
select * from new_members;

-- 4. 전체 행 개수 출력
select count(*) from new_members;

-- 5. 필드명 변경 (출력시에만 변경)
select u_name as '이름' from new_members;
select count(*) as '전체 데이터' from new_members;

-- 6. DISTINCT : 중복값 제외 검색
select distinct gender from new_members;

-- WHERE : 조건절

-- 1. 특정 필드에서 특정한 값을 가진 전체 데이터 검색
select * from new_members where idx=34;

-- 2. 특정 필드에서 특정한 값을 가진 일부 데이터 검색
select idx, u_name, u_id from new_members where idx=34;

-- 3. 수정, 삭제시에도 사용
delete from new_members where idx=30

-- SQL 연산자 (논리연산자 중 몇가지만)

-- 1. in : 비연속 데이터 검색 (입력된 값들만 선택)
select idx, u_name, u_id from new_members where idx in(25, 30, 35);

-- 2. between A and B : 범위 검색
select idx, u_name from new_members where idx between 22 and 30;
select idx, u_name, birth from new_members where birth between '1990-01-01' and '1995-12-31';

-- 3. LIKE, %(all) : 문자열 검색 (NOT LIKE)
select idx, u_name, addr from new_members where addr like '%서울%';
select idx, u_name, addr from new_members where addr not like '%서울%';


-- order by : 정렬
select idx, u_name from new_members where idx between 22 and 30 order by idx desc;
select idx, u_name, birth from new_members where birth between '1990-01-01' and '1995-12-31' order by birth;

-- UPDATE : 데이터 수정

-- 1. 단일 필드 수정
update new_members set addr='서울';

-- 2. 여러 필드 수정
update new_members set u_id='hong', pwd='1234';

-- 3. 특정 데이터 수정
update new_members set addr='경기' where idx=22;

-- DELETE : 데이터 삭제

-- 1. 모든 행 삭제
delete from new_members;

-- 2. 특정 행 삭제
delete from new_members where idx=22;