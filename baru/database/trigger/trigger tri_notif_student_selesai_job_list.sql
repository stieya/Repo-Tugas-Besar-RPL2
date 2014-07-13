delimiter //
create trigger tri_notif_student_selesai_job_list
after update on t_job_list
for each row 
begin
if (new.status = 'Finished') then
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select id_user from t_student_job_list tsjl join t_student ts on (tsjl.id_student = ts.id_student) where tsjl.id_job_list = new.id_job_list), 
'Perubahan status job list ', 
concat(concat('Status untuk job list ', new.head), concat(' telah selesai ', ' ')), 
current_timestamp, 
'0');
end if;
end;//
delimiter ;