delimiter //
create trigger tri_notif_student_lamaran_job_sheet_diterima
before update on t_job_sheet_application
for each row 
begin
if (new.status = '1') then
set new.status = '1';
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select id_user from t_student where id_student = new.id_student), 
'Status lamaran ', 
concat(concat('Status untuk lamaran ', (select nama_job_sheet from t_job_sheet where id_job_sheet = new.id_job_sheet)), concat(' dari Anda telah diterima ', ' ')), 
current_timestamp, 
'0');
elseif (new.status = '2') then
set new.status = '2';
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select id_user from t_student where id_student = new.id_student), 
'Status lamaran ', 
concat(concat('Status untuk lamaran ', (select nama_job_sheet from t_job_sheet where id_job_sheet = new.id_job_sheet)), concat(' telah ditolak ', ' ')), 
current_timestamp, 
'0');
end if;
end;//
delimiter ;