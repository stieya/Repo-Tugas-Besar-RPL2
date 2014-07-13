delimiter //
create trigger tri_notif_student_status_job_sheet
before update on t_student_job_sheet
for each row 
begin
if (new.status = '0') then
set new.status = '0';
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select id_user from t_student where id_student = new.id_student), 
concat('Status job sheet ', (select nama_job_sheet from t_job_sheet where id_job_sheet = new.id_job_sheet)), 
concat(concat('Status untuk job sheet ', (select nama_job_sheet from t_job_sheet where id_job_sheet = new.id_job_sheet)), concat(' telah ditutup oleh perusahaan ', ' ')), 
current_timestamp, 
'0');
end if;
end;//
delimiter ;