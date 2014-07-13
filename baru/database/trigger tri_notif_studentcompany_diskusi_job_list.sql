delimiter //
create trigger tri_notif_studentcompany_diskusi_job_list
after insert on t_comment_list
for each row 
begin
if ((select status_user from t_user tu where tu.id_user = new.id_user) = 'STUDENT') then
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select tu.id_user from t_job_list tjl join t_job_sheet tjs on (tjl.id_job_sheet = tjs.id_job_sheet) join t_perusahaan tp on (tp.id_perusahaan = tjs.id_perusahaan) join t_user tu on (tu.id_user = tp.id_user) where tjl.id_job_list = new.id_job_list), 
concat('Komentar baru dari job list ', (select head from t_job_list where id_job_list = new.id_job_list)), 
concat(concat('Komentar baru dari job list ', (select head from t_job_list where id_job_list = new.id_job_list)), concat(' dari student bernama ', (select ts.nama from t_student ts join t_user tu on (tu.id_user = ts.id_user) where tu.id_user = new.id_user))), 
current_timestamp, 
'0');
elseif ((select status_user from t_user tu where tu.id_user = new.id_user) = 'COMPANY') then
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select ts.id_user from t_job_list tjl join t_student_job_list tsjl on (tsjl.id_job_list = tjl.id_job_list) join t_student ts on (ts.id_student = tsjl.id_student) where tjl.id_job_list = new.id_job_list), 
concat('Komentar baru dari job list ', (select head from t_job_list where id_job_list = new.id_job_list)), 
concat(concat('Komentar baru dari job list ', (select head from t_job_list where id_job_list = new.id_job_list)), concat(' dari perusahaan', ' ')), 
current_timestamp, 
'0');
end if;
end;//
delimiter ;