DELIMITER //
create procedure sp_trigger_ganti_status_lamaran (IN _id INT)
begin
update t_job_sheet_application set status='2' where id_job_sheet = _id and status = '0';
end; //
delimiter ;