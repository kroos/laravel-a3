USE [ASD]
GO
/****** Object:  Trigger [tr_HSTABLE_UPDATE_LEVEL_MERC]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[tr_HSTABLE_UPDATE_LEVEL_MERC]'))
DROP TRIGGER [dbo].[tr_HSTABLE_UPDATE_LEVEL_MERC]
GO
/****** Object:  Trigger [tr_HSTABLE_INSERT]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[tr_HSTABLE_INSERT]'))
DROP TRIGGER [dbo].[tr_HSTABLE_INSERT]
GO
/****** Object:  Trigger [tr_HSTABLE_delete_data_MERC_UPDATE]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[tr_HSTABLE_delete_data_MERC_UPDATE]'))
DROP TRIGGER [dbo].[tr_HSTABLE_delete_data_MERC_UPDATE]
GO
/****** Object:  Trigger [tr_charac0]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[tr_charac0]'))
DROP TRIGGER [dbo].[tr_charac0]
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Hstable]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSTABLE]'))
ALTER TABLE [dbo].[HSTABLE] DROP CONSTRAINT [CK_Hstable]
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[ck_No_Special_Characters]') AND parent_object_id = OBJECT_ID(N'[dbo].[Charac0]'))
ALTER TABLE [dbo].[Charac0] DROP CONSTRAINT [ck_No_Special_Characters]
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Account_alphabet]') AND parent_object_id = OBJECT_ID(N'[dbo].[Account]'))
ALTER TABLE [dbo].[Account] DROP CONSTRAINT [CK_Account_alphabet]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_RcvResult_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[RcvResult]'))
ALTER TABLE [dbo].[RcvResult] DROP CONSTRAINT [FK_RcvResult_Account]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PostComment_Post]') AND parent_object_id = OBJECT_ID(N'[dbo].[PostComment]'))
ALTER TABLE [dbo].[PostComment] DROP CONSTRAINT [FK_PostComment_Post]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PostComment_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[PostComment]'))
ALTER TABLE [dbo].[PostComment] DROP CONSTRAINT [FK_PostComment_Charac0]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Post_PostCategory]') AND parent_object_id = OBJECT_ID(N'[dbo].[Post]'))
ALTER TABLE [dbo].[Post] DROP CONSTRAINT [FK_Post_PostCategory]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Post_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[Post]'))
ALTER TABLE [dbo].[Post] DROP CONSTRAINT [FK_Post_Account]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB9_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB9]'))
ALTER TABLE [dbo].[LETTERDB9] DROP CONSTRAINT [FK_LETTERDB9_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB9_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB9]'))
ALTER TABLE [dbo].[LETTERDB9] DROP CONSTRAINT [FK_LETTERDB9_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB8_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB8]'))
ALTER TABLE [dbo].[LETTERDB8] DROP CONSTRAINT [FK_LETTERDB8_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB8_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB8]'))
ALTER TABLE [dbo].[LETTERDB8] DROP CONSTRAINT [FK_LETTERDB8_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB7_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB7]'))
ALTER TABLE [dbo].[LETTERDB7] DROP CONSTRAINT [FK_LETTERDB7_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB7_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB7]'))
ALTER TABLE [dbo].[LETTERDB7] DROP CONSTRAINT [FK_LETTERDB7_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB6_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB6]'))
ALTER TABLE [dbo].[LETTERDB6] DROP CONSTRAINT [FK_LETTERDB6_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB6_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB6]'))
ALTER TABLE [dbo].[LETTERDB6] DROP CONSTRAINT [FK_LETTERDB6_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB5_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB5]'))
ALTER TABLE [dbo].[LETTERDB5] DROP CONSTRAINT [FK_LETTERDB5_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB5_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB5]'))
ALTER TABLE [dbo].[LETTERDB5] DROP CONSTRAINT [FK_LETTERDB5_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB4_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB4]'))
ALTER TABLE [dbo].[LETTERDB4] DROP CONSTRAINT [FK_LETTERDB4_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB4_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB4]'))
ALTER TABLE [dbo].[LETTERDB4] DROP CONSTRAINT [FK_LETTERDB4_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB3_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB3]'))
ALTER TABLE [dbo].[LETTERDB3] DROP CONSTRAINT [FK_LETTERDB3_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB3_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB3]'))
ALTER TABLE [dbo].[LETTERDB3] DROP CONSTRAINT [FK_LETTERDB3_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB2_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB2]'))
ALTER TABLE [dbo].[LETTERDB2] DROP CONSTRAINT [FK_LETTERDB2_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB2_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB2]'))
ALTER TABLE [dbo].[LETTERDB2] DROP CONSTRAINT [FK_LETTERDB2_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB15_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB15]'))
ALTER TABLE [dbo].[LETTERDB15] DROP CONSTRAINT [FK_LETTERDB15_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB15_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB15]'))
ALTER TABLE [dbo].[LETTERDB15] DROP CONSTRAINT [FK_LETTERDB15_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB14_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB14]'))
ALTER TABLE [dbo].[LETTERDB14] DROP CONSTRAINT [FK_LETTERDB14_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB14_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB14]'))
ALTER TABLE [dbo].[LETTERDB14] DROP CONSTRAINT [FK_LETTERDB14_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB13_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB13]'))
ALTER TABLE [dbo].[LETTERDB13] DROP CONSTRAINT [FK_LETTERDB13_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB13_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB13]'))
ALTER TABLE [dbo].[LETTERDB13] DROP CONSTRAINT [FK_LETTERDB13_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB12_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB12]'))
ALTER TABLE [dbo].[LETTERDB12] DROP CONSTRAINT [FK_LETTERDB12_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB12_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB12]'))
ALTER TABLE [dbo].[LETTERDB12] DROP CONSTRAINT [FK_LETTERDB12_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB11_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB11]'))
ALTER TABLE [dbo].[LETTERDB11] DROP CONSTRAINT [FK_LETTERDB11_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB11_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB11]'))
ALTER TABLE [dbo].[LETTERDB11] DROP CONSTRAINT [FK_LETTERDB11_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB10_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB10]'))
ALTER TABLE [dbo].[LETTERDB10] DROP CONSTRAINT [FK_LETTERDB10_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB10_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB10]'))
ALTER TABLE [dbo].[LETTERDB10] DROP CONSTRAINT [FK_LETTERDB10_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB1_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB1]'))
ALTER TABLE [dbo].[LETTERDB1] DROP CONSTRAINT [FK_LETTERDB1_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB1_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB1]'))
ALTER TABLE [dbo].[LETTERDB1] DROP CONSTRAINT [FK_LETTERDB1_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB0_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB0]'))
ALTER TABLE [dbo].[LETTERDB0] DROP CONSTRAINT [FK_LETTERDB0_Charac0_Sender]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB0_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB0]'))
ALTER TABLE [dbo].[LETTERDB0] DROP CONSTRAINT [FK_LETTERDB0_Charac0_Receiver]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ItemStorage0_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[ItemStorage0]'))
ALTER TABLE [dbo].[ItemStorage0] DROP CONSTRAINT [FK_ItemStorage0_Account]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Hstable_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSTABLE]'))
ALTER TABLE [dbo].[HSTABLE] DROP CONSTRAINT [FK_Hstable_Charac0]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Hsstonetable_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSSTONETABLE]'))
ALTER TABLE [dbo].[HSSTONETABLE] DROP CONSTRAINT [FK_Hsstonetable_Charac0]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Merc_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HS]'))
ALTER TABLE [dbo].[HS] DROP CONSTRAINT [FK_Merc_Charac0]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_FRIEND0_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[FRIEND0]'))
ALTER TABLE [dbo].[FRIEND0] DROP CONSTRAINT [FK_FRIEND0_Charac0]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ClanMember_ClanInfo]') AND parent_object_id = OBJECT_ID(N'[dbo].[ClanMember]'))
ALTER TABLE [dbo].[ClanMember] DROP CONSTRAINT [FK_ClanMember_ClanInfo]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ClanInfo_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[ClanInfo]'))
ALTER TABLE [dbo].[ClanInfo] DROP CONSTRAINT [FK_ClanInfo_Charac0]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_CharInfo_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[CharInfo]'))
ALTER TABLE [dbo].[CharInfo] DROP CONSTRAINT [FK_CharInfo_Charac0]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_CharInfo_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[CharInfo]'))
ALTER TABLE [dbo].[CharInfo] DROP CONSTRAINT [FK_CharInfo_Account]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Charac0_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[Charac0]'))
ALTER TABLE [dbo].[Charac0] DROP CONSTRAINT [FK_Charac0_Account]
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Account_Roles]') AND parent_object_id = OBJECT_ID(N'[dbo].[Account]'))
ALTER TABLE [dbo].[Account] DROP CONSTRAINT [FK_Account_Roles]
GO
IF  EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_MERC_reset_rb]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[HS] DROP CONSTRAINT [DF_MERC_reset_rb]
END

GO
IF  EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_MERC_rb]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[HS] DROP CONSTRAINT [DF_MERC_rb]
END

GO
IF  EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_charac0_times_rb]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[Charac0] DROP CONSTRAINT [DF_charac0_times_rb]
END

GO
IF  EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_charac0_rb]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[Charac0] DROP CONSTRAINT [DF_charac0_rb]
END

GO
/****** Object:  Index [unique]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[Charac0]') AND name = N'unique')
ALTER TABLE [dbo].[Charac0] DROP CONSTRAINT [unique]
GO
/****** Object:  Table [dbo].[UserTicket]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[UserTicket]') AND type in (N'U'))
DROP TABLE [dbo].[UserTicket]
GO
/****** Object:  Table [dbo].[UpdateLog]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[UpdateLog]') AND type in (N'U'))
DROP TABLE [dbo].[UpdateLog]
GO
/****** Object:  Table [dbo].[Syslogd]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Syslogd]') AND type in (N'U'))
DROP TABLE [dbo].[Syslogd]
GO
/****** Object:  Table [dbo].[StatusLog]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[StatusLog]') AND type in (N'U'))
DROP TABLE [dbo].[StatusLog]
GO
/****** Object:  Table [dbo].[SerialList]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[SerialList]') AND type in (N'U'))
DROP TABLE [dbo].[SerialList]
GO
/****** Object:  Table [dbo].[Roles]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Roles]') AND type in (N'U'))
DROP TABLE [dbo].[Roles]
GO
/****** Object:  Table [dbo].[RestoreRequest]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[RestoreRequest]') AND type in (N'U'))
DROP TABLE [dbo].[RestoreRequest]
GO
/****** Object:  Table [dbo].[ReservedPresent]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ReservedPresent]') AND type in (N'U'))
DROP TABLE [dbo].[ReservedPresent]
GO
/****** Object:  Table [dbo].[ReservedChar]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ReservedChar]') AND type in (N'U'))
DROP TABLE [dbo].[ReservedChar]
GO
/****** Object:  Table [dbo].[RcvResult]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[RcvResult]') AND type in (N'U'))
DROP TABLE [dbo].[RcvResult]
GO
/****** Object:  Table [dbo].[RandChar]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[RandChar]') AND type in (N'U'))
DROP TABLE [dbo].[RandChar]
GO
/****** Object:  Table [dbo].[QuestResponse]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[QuestResponse]') AND type in (N'U'))
DROP TABLE [dbo].[QuestResponse]
GO
/****** Object:  Table [dbo].[QuestList]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[QuestList]') AND type in (N'U'))
DROP TABLE [dbo].[QuestList]
GO
/****** Object:  Table [dbo].[PostComment]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[PostComment]') AND type in (N'U'))
DROP TABLE [dbo].[PostComment]
GO
/****** Object:  Table [dbo].[PostCategory]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[PostCategory]') AND type in (N'U'))
DROP TABLE [dbo].[PostCategory]
GO
/****** Object:  Table [dbo].[Post]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Post]') AND type in (N'U'))
DROP TABLE [dbo].[Post]
GO
/****** Object:  Table [dbo].[password_resets]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[password_resets]') AND type in (N'U'))
DROP TABLE [dbo].[password_resets]
GO
/****** Object:  Table [dbo].[OutAccount]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[OutAccount]') AND type in (N'U'))
DROP TABLE [dbo].[OutAccount]
GO
/****** Object:  Table [dbo].[LottoEvent]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LottoEvent]') AND type in (N'U'))
DROP TABLE [dbo].[LottoEvent]
GO
/****** Object:  Table [dbo].[Lotto]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Lotto]') AND type in (N'U'))
DROP TABLE [dbo].[Lotto]
GO
/****** Object:  Table [dbo].[LotteryTicket]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LotteryTicket]') AND type in (N'U'))
DROP TABLE [dbo].[LotteryTicket]
GO
/****** Object:  Table [dbo].[LETTERDB9]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB9]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB9]
GO
/****** Object:  Table [dbo].[LETTERDB8]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB8]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB8]
GO
/****** Object:  Table [dbo].[LETTERDB7]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB7]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB7]
GO
/****** Object:  Table [dbo].[LETTERDB6]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB6]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB6]
GO
/****** Object:  Table [dbo].[LETTERDB5]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB5]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB5]
GO
/****** Object:  Table [dbo].[LETTERDB4]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB4]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB4]
GO
/****** Object:  Table [dbo].[LETTERDB3]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB3]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB3]
GO
/****** Object:  Table [dbo].[LETTERDB2]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB2]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB2]
GO
/****** Object:  Table [dbo].[LETTERDB15]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB15]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB15]
GO
/****** Object:  Table [dbo].[LETTERDB14]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB14]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB14]
GO
/****** Object:  Table [dbo].[LETTERDB13]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB13]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB13]
GO
/****** Object:  Table [dbo].[LETTERDB12]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB12]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB12]
GO
/****** Object:  Table [dbo].[LETTERDB11]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB11]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB11]
GO
/****** Object:  Table [dbo].[LETTERDB10]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB10]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB10]
GO
/****** Object:  Table [dbo].[LETTERDB1]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB1]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB1]
GO
/****** Object:  Table [dbo].[LETTERDB0]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB0]') AND type in (N'U'))
DROP TABLE [dbo].[LETTERDB0]
GO
/****** Object:  Table [dbo].[Job]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Job]') AND type in (N'U'))
DROP TABLE [dbo].[Job]
GO
/****** Object:  Table [dbo].[ItemStorage0]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ItemStorage0]') AND type in (N'U'))
DROP TABLE [dbo].[ItemStorage0]
GO
/****** Object:  Table [dbo].[HSTABLE]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[HSTABLE]') AND type in (N'U'))
DROP TABLE [dbo].[HSTABLE]
GO
/****** Object:  Table [dbo].[HSSTONETABLE]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[HSSTONETABLE]') AND type in (N'U'))
DROP TABLE [dbo].[HSSTONETABLE]
GO
/****** Object:  Table [dbo].[HS]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[HS]') AND type in (N'U'))
DROP TABLE [dbo].[HS]
GO
/****** Object:  Table [dbo].[GroupSeat]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GroupSeat]') AND type in (N'U'))
DROP TABLE [dbo].[GroupSeat]
GO
/****** Object:  Table [dbo].[GameServerMessage]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GameServerMessage]') AND type in (N'U'))
DROP TABLE [dbo].[GameServerMessage]
GO
/****** Object:  Table [dbo].[GameServer]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GameServer]') AND type in (N'U'))
DROP TABLE [dbo].[GameServer]
GO
/****** Object:  Table [dbo].[GameLoginLog]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GameLoginLog]') AND type in (N'U'))
DROP TABLE [dbo].[GameLoginLog]
GO
/****** Object:  Table [dbo].[GameBroadcast]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GameBroadcast]') AND type in (N'U'))
DROP TABLE [dbo].[GameBroadcast]
GO
/****** Object:  Table [dbo].[FRIEND0]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[FRIEND0]') AND type in (N'U'))
DROP TABLE [dbo].[FRIEND0]
GO
/****** Object:  Table [dbo].[ClanMember]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ClanMember]') AND type in (N'U'))
DROP TABLE [dbo].[ClanMember]
GO
/****** Object:  Table [dbo].[ClanInfo]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ClanInfo]') AND type in (N'U'))
DROP TABLE [dbo].[ClanInfo]
GO
/****** Object:  Table [dbo].[Clan]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Clan]') AND type in (N'U'))
DROP TABLE [dbo].[Clan]
GO
/****** Object:  Table [dbo].[CharInfo]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[CharInfo]') AND type in (N'U'))
DROP TABLE [dbo].[CharInfo]
GO
/****** Object:  Table [dbo].[Charac0]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Charac0]') AND type in (N'U'))
DROP TABLE [dbo].[Charac0]
GO
/****** Object:  Table [dbo].[BlackList]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[BlackList]') AND type in (N'U'))
DROP TABLE [dbo].[BlackList]
GO
/****** Object:  Table [dbo].[Account]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Account]') AND type in (N'U'))
DROP TABLE [dbo].[Account]
GO
/****** Object:  UserDefinedFunction [dbo].[GetAccountName]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GetAccountName]') AND type in (N'FN', N'IF', N'TF', N'FS', N'FT'))
DROP FUNCTION [dbo].[GetAccountName]
GO
/****** Object:  User [a3serial]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.database_principals WHERE name = N'a3serial')
DROP USER [a3serial]
GO
/****** Object:  User [a8serial]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT * FROM sys.database_principals WHERE name = N'a8serial')
DROP USER [a8serial]
GO
USE [master]
GO
/****** Object:  Database [ASD]    Script Date: 15/6/2020 1:32:57 AM ******/
IF  EXISTS (SELECT name FROM sys.databases WHERE name = N'ASD')
DROP DATABASE [ASD]
GO
/****** Object:  Database [ASD]    Script Date: 15/6/2020 1:32:57 AM ******/
IF NOT EXISTS (SELECT name FROM sys.databases WHERE name = N'ASD')
BEGIN
CREATE DATABASE [ASD]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'ASD', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL12.MSSQLSERVER\MSSQL\DATA\ASD.mdf' , SIZE = 4096KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'ASD_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL12.MSSQLSERVER\MSSQL\DATA\ASD_log.ldf' , SIZE = 3456KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
 COLLATE SQL_Latin1_General_CP1251_CS_AS
END

GO
ALTER DATABASE [ASD] SET COMPATIBILITY_LEVEL = 100
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [ASD].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [ASD] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [ASD] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [ASD] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [ASD] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [ASD] SET ARITHABORT OFF 
GO
ALTER DATABASE [ASD] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [ASD] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [ASD] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [ASD] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [ASD] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [ASD] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [ASD] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [ASD] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [ASD] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [ASD] SET  DISABLE_BROKER 
GO
ALTER DATABASE [ASD] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [ASD] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [ASD] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [ASD] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [ASD] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [ASD] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [ASD] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [ASD] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [ASD] SET  MULTI_USER 
GO
ALTER DATABASE [ASD] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [ASD] SET DB_CHAINING OFF 
GO
ALTER DATABASE [ASD] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [ASD] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
ALTER DATABASE [ASD] SET DELAYED_DURABILITY = DISABLED 
GO
USE [ASD]
GO
/****** Object:  User [a8serial]    Script Date: 15/6/2020 1:32:57 AM ******/
IF NOT EXISTS (SELECT * FROM sys.database_principals WHERE name = N'a8serial')
CREATE USER [a8serial] FOR LOGIN [a8serial] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [a3serial]    Script Date: 15/6/2020 1:32:57 AM ******/
IF NOT EXISTS (SELECT * FROM sys.database_principals WHERE name = N'a3serial')
CREATE USER [a3serial] FOR LOGIN [a3serial] WITH DEFAULT_SCHEMA=[db_owner]
GO
ALTER ROLE [db_owner] ADD MEMBER [a8serial]
GO
ALTER ROLE [db_owner] ADD MEMBER [a3serial]
GO
/****** Object:  UserDefinedFunction [dbo].[GetAccountName]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GetAccountName]') AND type in (N'FN', N'IF', N'TF', N'FS', N'FT'))
BEGIN
execute dbo.sp_executesql @statement = N'
CREATE  FUNCTION [dbo].[GetAccountName](@CharacterName char(20))
RETURNS char(20) AS  
BEGIN   
   DECLARE @AccountName char(20)
   select @AccountName = c_sheadera
   from ASD.dbo.Character
   where c_id=@CharacterName

   RETURN @AccountName
END

' 
END

GO
/****** Object:  Table [dbo].[Account]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Account]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Account](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheadera] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderb] [int] NOT NULL,
	[c_sheaderc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[email_verified_at] [smalldatetime] NULL,
	[m_body] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[salary] [smalldatetime] NULL,
	[last_salary] [smalldatetime] NULL,
 CONSTRAINT [PK_Account_unique] PRIMARY KEY CLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BlackList]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[BlackList]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[BlackList](
	[BlackListID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[BlockStartDate] [smalldatetime] NOT NULL,
	[BlockEndDate] [smalldatetime] NOT NULL,
	[AccountStatus] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Status] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Content] [varchar](1000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Charac0]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Charac0]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Charac0](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheadera] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderc] [int] NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[m_body] [varchar](4000) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[rb] [int] NOT NULL,
	[times_rb] [int] NOT NULL,
 CONSTRAINT [PK_Charac0] PRIMARY KEY CLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[CharInfo]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[CharInfo]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[CharInfo](
	[AccountID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ServerIdx] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CharName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Type] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Nation] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[None] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Clan]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Clan]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Clan](
	[ClanID] [char](2) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ServerID] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanName] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Nation] [int] NOT NULL,
	[MarkID] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CDate] [smalldatetime] NULL,
	[DDate] [smalldatetime] NULL,
	[ClanPasswd] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanRank] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanStatus] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[StorageID] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[AgitID] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[WinCount] [int] NOT NULL,
	[LoseCount] [int] NOT NULL,
 CONSTRAINT [PK_Clan] PRIMARY KEY CLUSTERED 
(
	[ClanID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ClanInfo]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ClanInfo]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[ClanInfo](
	[ClanID] [char](2) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ServerID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanName] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Nation] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MarkID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CDate] [smalldatetime] NULL,
	[DDate] [smalldatetime] NULL,
	[ClanPasswd] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanRank] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanStatus] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[StorageID] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[AgitID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[WinCount] [int] NOT NULL,
	[LoseCount] [int] NOT NULL,
 CONSTRAINT [PK_ClanInfo] PRIMARY KEY CLUSTERED 
(
	[ClanID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ClanMember]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ClanMember]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[ClanMember](
	[ClanID] [char](2) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ServerID] [varchar](50) COLLATE Latin1_General_CI_AS NOT NULL,
	[CharName] [varchar](50) COLLATE Latin1_General_CI_AS NOT NULL,
	[Level] [int] NOT NULL,
	[Class] [varchar](50) COLLATE Latin1_General_CI_AS NOT NULL,
	[Rank] [varchar](50) COLLATE Latin1_General_CI_AS NOT NULL,
 CONSTRAINT [PK_ClanMember] PRIMARY KEY CLUSTERED 
(
	[ClanID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[FRIEND0]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[FRIEND0]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[FRIEND0](
	[CharName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[GroupInfo] [varchar](1024) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[FriendInfo] [varchar](1024) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_FRIEND0] PRIMARY KEY CLUSTERED 
(
	[CharName] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameBroadcast]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GameBroadcast]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[GameBroadcast](
	[GameBroadcastID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[Job] [varchar](200) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Motive] [varchar](2000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Intro] [varchar](2000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[FilePath] [varchar](200) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameLoginLog]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GameLoginLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[GameLoginLog](
	[LoginIdx] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginIP] [varchar](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginDate] [smalldatetime] NOT NULL,
	[PayMode] [char](3) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameServer]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GameServer]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[GameServer](
	[ServerIdx] [tinyint] NOT NULL,
	[ServerName] [char](16) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CntRegist] [int] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameServerMessage]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GameServerMessage]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[GameServerMessage](
	[AccountID] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[StatusID] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[mbody] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Message] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[GroupSeat]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[GroupSeat]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[GroupSeat](
	[GroupSeatID] [int] NOT NULL,
	[Master] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatName] [varchar](40) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatType] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatPassword] [varchar](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ServerIdx] [tinyint] NOT NULL,
	[CntRegist] [tinyint] NOT NULL,
	[Name] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[HS]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[HS]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[HS](
	[HSID] [int] NOT NULL,
	[HSName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Type] [int] NOT NULL,
	[HSLevel] [int] NOT NULL,
	[rb] [int] NULL,
	[reset_rb] [int] NULL,
	[created_at] [smalldatetime] NULL,
	[updated_at] [smalldatetime] NULL,
 CONSTRAINT [PK_Merc] PRIMARY KEY CLUSTERED 
(
	[HSName] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[HSSTONETABLE]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[HSSTONETABLE]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[HSSTONETABLE](
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CreateDate] [smalldatetime] NULL,
	[SaveDate] [smalldatetime] NULL,
	[Slot0] [varchar](256) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Slot1] [varchar](256) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Slot2] [varchar](256) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Slot3] [varchar](256) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
 CONSTRAINT [PK_Hsstonetable] PRIMARY KEY CLUSTERED 
(
	[MasterName] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[HSTABLE]    Script Date: 15/6/2020 1:32:57 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[HSTABLE]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[HSTABLE](
	[HSID] [int] IDENTITY(1,1) NOT NULL,
	[HSName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Type] [tinyint] NOT NULL,
	[HSLevel] [smallint] NOT NULL,
	[HSExp] [bigint] NOT NULL,
	[Ability] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CreateDate] [smalldatetime] NOT NULL,
	[SaveDate] [smalldatetime] NULL,
	[HSState] [tinyint] NOT NULL,
	[DelDate] [smalldatetime] NULL,
	[HSBody] [varchar](1024) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_Hstable] PRIMARY KEY CLUSTERED 
(
	[HSID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ItemStorage0]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ItemStorage0]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[ItemStorage0](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheadera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[d_cdate] [datetime] NULL,
	[d_udate] [datetime] NULL,
	[c_status] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[m_body] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_ItemStorage] PRIMARY KEY CLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Job]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Job]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Job](
	[JobID] [int] IDENTITY(1,1) NOT NULL,
	[JobName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AI NOT NULL,
 CONSTRAINT [PK_Job] PRIMARY KEY CLUSTERED 
(
	[JobID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB0]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB0]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB0](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB0] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB1]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB1]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB1](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB1] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB10]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB10]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB10](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB10] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB11]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB11]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB11](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB11] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB12]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB12]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB12](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB12] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB13]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB13]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB13](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB13] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB14]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB14]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB14](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB14] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB15]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB15]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB15](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB15] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB2]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB2]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB2](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB2] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB3]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB3]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB3](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB3] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB4]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB4]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB4](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB4] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB5]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB5]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB5](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB5] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB6]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB6]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB6](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB6] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB7]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB7]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB7](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB7] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB8]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB8]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB8](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB8] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB9]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LETTERDB9]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LETTERDB9](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB9] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LotteryTicket]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LotteryTicket]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LotteryTicket](
	[LotteryTicketID] [bigint] NOT NULL,
	[IsUsed] [varchar](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[TicketNo] [varchar](12) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LotteryTicket] PRIMARY KEY CLUSTERED 
(
	[LotteryTicketID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Lotto]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Lotto]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Lotto](
	[LottoEventID] [smallint] NOT NULL,
	[AccountID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SelectNum1] [tinyint] NOT NULL,
	[SelectNum2] [tinyint] NOT NULL,
	[SelectNum3] [tinyint] NOT NULL,
	[SelectNum4] [tinyint] NOT NULL,
	[SelectNum5] [tinyint] NOT NULL,
 CONSTRAINT [PK_Lotto] PRIMARY KEY CLUSTERED 
(
	[LottoEventID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LottoEvent]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[LottoEvent]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[LottoEvent](
	[LottoEventID] [smallint] NOT NULL,
	[EventName] [varchar](30) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LottoEvent] PRIMARY KEY CLUSTERED 
(
	[LottoEventID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[OutAccount]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[OutAccount]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[OutAccount](
	[OutAccountID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[OutDate] [smalldatetime] NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ResultUser] [varchar](20) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[ResultDesc] [varchar](4000) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Reason] [varchar](1000) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[RestoreDate] [smalldatetime] NULL,
	[SCN] [varchar](14) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[PrevStatus] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ResultDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[password_resets]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[password_resets]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[password_resets](
	[email] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[token] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[created_at] [smalldatetime] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Post]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Post]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Post](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[author] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[category_id] [int] NOT NULL,
	[subject] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[post] [text] COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[created_at] [smalldatetime] NOT NULL,
	[updated_at] [smalldatetime] NOT NULL,
 CONSTRAINT [PK_Post] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[PostCategory]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[PostCategory]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[PostCategory](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[category] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[created_at] [smalldatetime] NOT NULL,
	[updated_at] [smalldatetime] NULL,
 CONSTRAINT [PK_PostCategory] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[PostComment]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[PostComment]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[PostComment](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[post_id] [int] NOT NULL,
	[author] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[comment] [text] COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[created_at] [smalldatetime] NOT NULL,
	[updated_at] [smalldatetime] NOT NULL,
 CONSTRAINT [PK_PostComment] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[QuestList]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[QuestList]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[QuestList](
	[QuestNo] [tinyint] NOT NULL,
	[Content] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[QuestFlag] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[QuestResponse]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[QuestResponse]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[QuestResponse](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RandChar]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[RandChar]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[RandChar](
	[RandNo] [int] NOT NULL,
	[Rand] [int] NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RcvResult]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[RcvResult]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[RcvResult](
	[AccountName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[PCName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Serial] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[DateTimeLog] [datetime] NOT NULL,
 CONSTRAINT [PK_RcvResult] PRIMARY KEY CLUSTERED 
(
	[AccountName] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ReservedChar]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ReservedChar]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[ReservedChar](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CharName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ServerIdx] [tinyint] NOT NULL,
	[CharClass] [tinyint] NOT NULL,
	[Nation] [tinyint] NOT NULL,
	[GroupSeatID] [int] NULL,
	[RegistDate] [smalldatetime] NOT NULL,
	[Sex] [tinyint] NOT NULL,
	[Name] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ReservedPresent]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ReservedPresent]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[ReservedPresent](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatName] [varchar](49) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[PresentType] [varchar](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Present] [varchar](100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RestoreRequest]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[RestoreRequest]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[RestoreRequest](
	[RestoreRequestID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN] [char](14) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[ResultDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Roles]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Roles]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Roles](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[role] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[remarks] [text] COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[created_at] [smalldatetime] NOT NULL,
	[updated_at] [smalldatetime] NOT NULL,
 CONSTRAINT [PK_Roles] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[SerialList]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[SerialList]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[SerialList](
	[SerialNo] [char](20) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ItemInfo] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Parameter1] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Parameter2] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Type] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[UsedFlag] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ExpireDate] [datetime] NOT NULL,
 CONSTRAINT [PK_SerialList] PRIMARY KEY CLUSTERED 
(
	[SerialNo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[StatusLog]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[StatusLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[StatusLog](
	[StatusLogID] [int] NOT NULL,
	[ManageID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Status] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[StartDate] [smalldatetime] NOT NULL,
	[EndDate] [smalldatetime] NOT NULL,
	[Content] [varchar](1000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LogDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Syslogd]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Syslogd]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Syslogd](
	[MsgUnique] [int] IDENTITY(1,1) NOT NULL,
	[MsgDateTime] [datetime] NULL,
	[MsgLevelNum] [int] NULL,
	[MsgPriority] [varchar](30) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[MsgLevel] [varchar](15) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[MsgHostAddress] [varchar](15) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[MsgHostname] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[MsgText] [text] COLLATE SQL_Latin1_General_CP1251_CS_AS NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[UpdateLog]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[UpdateLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[UpdateLog](
	[UpdateLogID] [int] NOT NULL,
	[ManageID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[UpdateContent] [varchar](3000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LogDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[UserTicket]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[UserTicket]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[UserTicket](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[TicketNo] [char](12) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[Account] ([c_id], [c_sheadera], [c_sheaderb], [c_sheaderc], [c_headera], [c_headerb], [c_headerc], [d_cdate], [d_udate], [c_status], [email_verified_at], [m_body], [salary], [last_salary]) VALUES (N'krooitnot', N'Outlaw', 1, N'ban_account', N'12345678', N'dhiauddin@gmail.com', N'4PTguvYsAdMp18jLyVVlkDXkc1o1m1Hxjq6F6fDzNBvXn2bEblmft1Hk6821', CAST(N'2018-03-08 00:32:00' AS SmallDateTime), CAST(N'2020-05-22 17:35:00' AS SmallDateTime), N'A', CAST(N'2020-03-25 16:23:00' AS SmallDateTime), N'reserve', CAST(N'2020-05-22 17:35:00' AS SmallDateTime), CAST(N'2020-07-18 00:32:00' AS SmallDateTime))
INSERT [dbo].[Charac0] ([c_id], [c_sheadera], [c_sheaderb], [c_sheaderc], [c_headera], [c_headerb], [c_headerc], [d_cdate], [d_udate], [c_status], [m_body], [rb], [times_rb]) VALUES (N'Outlaw', N'krooitnot', N'0', 44, N'5522;0;5508;6116;5434;0;21088;7971;100000;100000', N'51;15010', N'2026825964', NULL, CAST(N'2020-05-23 03:45:00' AS SmallDateTime), N'A', N'EXP=5732952\_1SKILL=4294967295;4294967295;4294967295\_1PK=0\_1RTM=0\_1SINFO=131072\_1WEAR=230509;4294952575;266775;230437;4294953087;265751;232742;4294954042;1052183;232732;4294955066;396823;232737;4294956090;790039;232752;4294957114;396823;232747;4294958138;265751;4151;4294959137;398871;5153;4294961121;132404\_1INVEN=7170;32;399172;0;8417;32;134468;2;9232;32;137028;3;9823;32;134468;5;9231;32;268100;6;7396;32;268100;7;1031;2113;137028;8;9923;32;268100;9;7396;32;134468;10;17518;100;4294967295;11;5;91;123;16;4151;4294959137;398871;18;8417;32;265796;22;5153;4294961121;132404;23;4151;4294959137;398871;24;7171;32;921156;25;8417;32;396868;26;7171;32;1052228;27;9578;32;265796;29\_1PETINV=\_1CQUEST=1;1;0;0;0;0;0;0;1\_1WAR=0;0;0\_1SQUEST=0\_1FAVOR=0;392497562;0;0;393150468;0;0;0;0;0;0;392429568;0;393150464;0;0;392429568;393150464;0;393150464;0;0;0;0;0;392495104;0;0;392495104;0;392495104;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0\_1PSKILL=0;0;0;0;0;0\_1SKLSLT=14;0;32;33;36;37;0;0;0;0;0;0;14\_1CHATOPT=255;31;227\_1TYR=0;0;0\_1SKILLEX=4294967295;4294967295;4294967295\_1SKLSLTEX=14;0;32;33;36;37;0;0;0;0;0;0;14\_1PETACT=1012;76684069;4240441599;4294077423\_1LORE=10000\_1LQUEST=0\_1RESRV0=0\_1RESRV1=0\_1', 1, 0)
INSERT [dbo].[CharInfo] ([AccountID], [ServerIdx], [CharName], [Type], [Nation], [None]) VALUES (N'krooitnot', N'0', N'Outlaw', N'0', N'0', NULL)
INSERT [dbo].[FRIEND0] ([CharName], [GroupInfo], [FriendInfo]) VALUES (N'Outlaw', N'A3Friend;;;;;;;;;;', N'0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0;;')
INSERT [dbo].[GameServer] ([ServerIdx], [ServerName], [CntRegist]) VALUES (1, N'AKU             ', 2)
INSERT [dbo].[GameServerMessage] ([AccountID], [StatusID], [mbody], [Message]) VALUES (N'krooitnot', N'1', N'123', N'test message')
INSERT [dbo].[HS] ([HSID], [HSName], [MasterName], [Type], [HSLevel], [rb], [reset_rb], [created_at], [updated_at]) VALUES (9, N'Ashraff', N'Outlaw', 2, 64, 0, 0, NULL, NULL)
INSERT [dbo].[HS] ([HSID], [HSName], [MasterName], [Type], [HSLevel], [rb], [reset_rb], [created_at], [updated_at]) VALUES (8, N'Gearabah', N'Outlaw', 3, 41, 1, 0, NULL, CAST(N'2020-05-22 17:45:00' AS SmallDateTime))
INSERT [dbo].[HSSTONETABLE] ([MasterName], [CreateDate], [SaveDate], [Slot0], [Slot1], [Slot2], [Slot3]) VALUES (N'Outlaw', CAST(N'2020-05-12 00:42:00' AS SmallDateTime), CAST(N'2020-05-23 03:45:00' AS SmallDateTime), N'1;3;8;41;Gearabah;', N'0;0;0;0;;', N'1;2;9;64;Ashraff;', N'0;0;0;0;;')
SET IDENTITY_INSERT [dbo].[HSTABLE] ON 

INSERT [dbo].[HSTABLE] ([HSID], [HSName], [MasterName], [Type], [HSLevel], [HSExp], [Ability], [CreateDate], [SaveDate], [HSState], [DelDate], [HSBody]) VALUES (8, N'Gearabah', N'Outlaw', 3, 41, 1137500, N'5628;0;5618;150;0;160;339;2680;0;', CAST(N'2020-05-12 03:20:00' AS SmallDateTime), CAST(N'2020-05-23 03:45:00' AS SmallDateTime), 0, NULL, N'SKILL=126;126;126;126;126;126;126;126;126;126PK=0WEAR=17518;100;4294967295;233112;4294954042;266775;233092;4294955066;266775;233102;4294956090;266775;233132;4294957114;266775;233122;4294958138;266775;4151;4294959137;398871;5153;4294961121;132404OPTION=0;0;50')
INSERT [dbo].[HSTABLE] ([HSID], [HSName], [MasterName], [Type], [HSLevel], [HSExp], [Ability], [CreateDate], [SaveDate], [HSState], [DelDate], [HSBody]) VALUES (9, N'Ashraff', N'Outlaw', 2, 64, 6597500, N'20;5030;5020;5150;0;252;63;8736;0;', CAST(N'2020-05-13 20:00:00' AS SmallDateTime), CAST(N'2020-05-23 03:42:00' AS SmallDateTime), 0, NULL, N'SKILL=126;126;126;126;126;126;126;126;126;126PK=0WEAR=17518;100;4294967295OPTION=0;0;50')
SET IDENTITY_INSERT [dbo].[HSTABLE] OFF
INSERT [dbo].[ItemStorage0] ([c_id], [c_sheadera], [c_sheaderb], [c_sheaderc], [c_headera], [c_headerb], [c_headerc], [d_cdate], [d_udate], [c_status], [m_body]) VALUES (N'krooitnot', N'0', N'0', N'0', N'0', N'0', N'100000000', NULL, CAST(N'2020-05-23 03:35:27.820' AS DateTime), N'A', N'4151;4294959137;398871;1;5153;4294961121;132404;2;9899;32;134468;3;9923;32;137028;4;9934;33;134212;9;9586;32;137028;11;9586;123;123;12;9586;123;123;13;9586;123;123;14;9586;123;123;15;9586;123;123;16;9586;123;123;17;9586;123;123;18;9586;123;123;19;9586;123;123;20;9586;123;123;21;17;1645570;131845;22;17;1644544;131845;23;17;1645796;131845;24')
SET IDENTITY_INSERT [dbo].[PostCategory] ON 

INSERT [dbo].[PostCategory] ([id], [category], [created_at], [updated_at]) VALUES (1, N'News  <i class="fas fa-newspaper"></i>', CAST(N'2020-02-18 00:00:00' AS SmallDateTime), CAST(N'2020-02-18 00:00:00' AS SmallDateTime))
INSERT [dbo].[PostCategory] ([id], [category], [created_at], [updated_at]) VALUES (2, N'Announcement <i class="fas fa-bullhorn"></i>', CAST(N'2020-02-18 00:00:00' AS SmallDateTime), CAST(N'2020-02-18 00:00:00' AS SmallDateTime))
INSERT [dbo].[PostCategory] ([id], [category], [created_at], [updated_at]) VALUES (3, N'Download <i class="fas fa-download"></i>', CAST(N'2020-02-18 00:00:00' AS SmallDateTime), CAST(N'2020-02-18 00:00:00' AS SmallDateTime))
SET IDENTITY_INSERT [dbo].[PostCategory] OFF
SET IDENTITY_INSERT [dbo].[Roles] ON 

INSERT [dbo].[Roles] ([id], [role], [remarks], [created_at], [updated_at]) VALUES (1, N'Game Master', N'administrator', CAST(N'2020-03-01 00:00:00' AS SmallDateTime), CAST(N'2020-03-01 00:00:00' AS SmallDateTime))
INSERT [dbo].[Roles] ([id], [role], [remarks], [created_at], [updated_at]) VALUES (2, N'Gold Member', N'paid user', CAST(N'2020-03-28 00:00:00' AS SmallDateTime), CAST(N'2020-03-28 00:00:00' AS SmallDateTime))
INSERT [dbo].[Roles] ([id], [role], [remarks], [created_at], [updated_at]) VALUES (3, N'Silver Member', N'paid user', CAST(N'2020-03-28 00:00:00' AS SmallDateTime), CAST(N'2020-03-28 00:00:00' AS SmallDateTime))
INSERT [dbo].[Roles] ([id], [role], [remarks], [created_at], [updated_at]) VALUES (4, N'Bronze Member', N'paid user', CAST(N'2020-03-28 00:00:00' AS SmallDateTime), CAST(N'2020-03-28 00:00:00' AS SmallDateTime))
INSERT [dbo].[Roles] ([id], [role], [remarks], [created_at], [updated_at]) VALUES (5, N'Normal Member', N'normal user', CAST(N'2020-03-28 00:00:00' AS SmallDateTime), CAST(N'2020-03-28 00:00:00' AS SmallDateTime))
SET IDENTITY_INSERT [dbo].[Roles] OFF
INSERT [dbo].[SerialList] ([SerialNo], [ItemInfo], [Parameter1], [Parameter2], [Type], [UsedFlag], [ExpireDate]) VALUES (N'123123              ', N'9586', N'123', N'123', N'1', N'0', CAST(N'2020-05-18 00:00:00.000' AS DateTime))
SET ANSI_PADDING ON

GO
/****** Object:  Index [unique]    Script Date: 15/6/2020 1:32:58 AM ******/
IF NOT EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[Charac0]') AND name = N'unique')
ALTER TABLE [dbo].[Charac0] ADD  CONSTRAINT [unique] UNIQUE NONCLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_charac0_rb]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[Charac0] ADD  CONSTRAINT [DF_charac0_rb]  DEFAULT ((0)) FOR [rb]
END

GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_charac0_times_rb]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[Charac0] ADD  CONSTRAINT [DF_charac0_times_rb]  DEFAULT ((0)) FOR [times_rb]
END

GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_MERC_rb]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[HS] ADD  CONSTRAINT [DF_MERC_rb]  DEFAULT ((0)) FOR [rb]
END

GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_MERC_reset_rb]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[HS] ADD  CONSTRAINT [DF_MERC_reset_rb]  DEFAULT ((0)) FOR [reset_rb]
END

GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Account_Roles]') AND parent_object_id = OBJECT_ID(N'[dbo].[Account]'))
ALTER TABLE [dbo].[Account]  WITH CHECK ADD  CONSTRAINT [FK_Account_Roles] FOREIGN KEY([c_sheaderb])
REFERENCES [dbo].[Roles] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Account_Roles]') AND parent_object_id = OBJECT_ID(N'[dbo].[Account]'))
ALTER TABLE [dbo].[Account] CHECK CONSTRAINT [FK_Account_Roles]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Charac0_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[Charac0]'))
ALTER TABLE [dbo].[Charac0]  WITH CHECK ADD  CONSTRAINT [FK_Charac0_Account] FOREIGN KEY([c_sheadera])
REFERENCES [dbo].[Account] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Charac0_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[Charac0]'))
ALTER TABLE [dbo].[Charac0] CHECK CONSTRAINT [FK_Charac0_Account]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_CharInfo_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[CharInfo]'))
ALTER TABLE [dbo].[CharInfo]  WITH CHECK ADD  CONSTRAINT [FK_CharInfo_Account] FOREIGN KEY([AccountID])
REFERENCES [dbo].[Account] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_CharInfo_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[CharInfo]'))
ALTER TABLE [dbo].[CharInfo] CHECK CONSTRAINT [FK_CharInfo_Account]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_CharInfo_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[CharInfo]'))
ALTER TABLE [dbo].[CharInfo]  WITH CHECK ADD  CONSTRAINT [FK_CharInfo_Charac0] FOREIGN KEY([CharName])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_CharInfo_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[CharInfo]'))
ALTER TABLE [dbo].[CharInfo] CHECK CONSTRAINT [FK_CharInfo_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ClanInfo_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[ClanInfo]'))
ALTER TABLE [dbo].[ClanInfo]  WITH CHECK ADD  CONSTRAINT [FK_ClanInfo_Charac0] FOREIGN KEY([MasterName])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ClanInfo_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[ClanInfo]'))
ALTER TABLE [dbo].[ClanInfo] CHECK CONSTRAINT [FK_ClanInfo_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ClanMember_ClanInfo]') AND parent_object_id = OBJECT_ID(N'[dbo].[ClanMember]'))
ALTER TABLE [dbo].[ClanMember]  WITH CHECK ADD  CONSTRAINT [FK_ClanMember_ClanInfo] FOREIGN KEY([ClanID])
REFERENCES [dbo].[ClanInfo] ([ClanID])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ClanMember_ClanInfo]') AND parent_object_id = OBJECT_ID(N'[dbo].[ClanMember]'))
ALTER TABLE [dbo].[ClanMember] CHECK CONSTRAINT [FK_ClanMember_ClanInfo]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_FRIEND0_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[FRIEND0]'))
ALTER TABLE [dbo].[FRIEND0]  WITH CHECK ADD  CONSTRAINT [FK_FRIEND0_Charac0] FOREIGN KEY([CharName])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_FRIEND0_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[FRIEND0]'))
ALTER TABLE [dbo].[FRIEND0] CHECK CONSTRAINT [FK_FRIEND0_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Merc_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HS]'))
ALTER TABLE [dbo].[HS]  WITH CHECK ADD  CONSTRAINT [FK_Merc_Charac0] FOREIGN KEY([MasterName])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Merc_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HS]'))
ALTER TABLE [dbo].[HS] CHECK CONSTRAINT [FK_Merc_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Hsstonetable_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSSTONETABLE]'))
ALTER TABLE [dbo].[HSSTONETABLE]  WITH CHECK ADD  CONSTRAINT [FK_Hsstonetable_Charac0] FOREIGN KEY([MasterName])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Hsstonetable_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSSTONETABLE]'))
ALTER TABLE [dbo].[HSSTONETABLE] CHECK CONSTRAINT [FK_Hsstonetable_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Hstable_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSTABLE]'))
ALTER TABLE [dbo].[HSTABLE]  WITH CHECK ADD  CONSTRAINT [FK_Hstable_Charac0] FOREIGN KEY([MasterName])
REFERENCES [dbo].[Charac0] ([c_id])
ON UPDATE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Hstable_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSTABLE]'))
ALTER TABLE [dbo].[HSTABLE] CHECK CONSTRAINT [FK_Hstable_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ItemStorage0_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[ItemStorage0]'))
ALTER TABLE [dbo].[ItemStorage0]  WITH CHECK ADD  CONSTRAINT [FK_ItemStorage0_Account] FOREIGN KEY([c_id])
REFERENCES [dbo].[Account] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ItemStorage0_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[ItemStorage0]'))
ALTER TABLE [dbo].[ItemStorage0] CHECK CONSTRAINT [FK_ItemStorage0_Account]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB0_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB0]'))
ALTER TABLE [dbo].[LETTERDB0]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB0_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB0_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB0]'))
ALTER TABLE [dbo].[LETTERDB0] CHECK CONSTRAINT [FK_LETTERDB0_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB0_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB0]'))
ALTER TABLE [dbo].[LETTERDB0]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB0_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB0_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB0]'))
ALTER TABLE [dbo].[LETTERDB0] CHECK CONSTRAINT [FK_LETTERDB0_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB1_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB1]'))
ALTER TABLE [dbo].[LETTERDB1]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB1_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB1_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB1]'))
ALTER TABLE [dbo].[LETTERDB1] CHECK CONSTRAINT [FK_LETTERDB1_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB1_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB1]'))
ALTER TABLE [dbo].[LETTERDB1]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB1_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB1_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB1]'))
ALTER TABLE [dbo].[LETTERDB1] CHECK CONSTRAINT [FK_LETTERDB1_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB10_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB10]'))
ALTER TABLE [dbo].[LETTERDB10]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB10_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB10_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB10]'))
ALTER TABLE [dbo].[LETTERDB10] CHECK CONSTRAINT [FK_LETTERDB10_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB10_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB10]'))
ALTER TABLE [dbo].[LETTERDB10]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB10_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB10_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB10]'))
ALTER TABLE [dbo].[LETTERDB10] CHECK CONSTRAINT [FK_LETTERDB10_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB11_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB11]'))
ALTER TABLE [dbo].[LETTERDB11]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB11_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB11_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB11]'))
ALTER TABLE [dbo].[LETTERDB11] CHECK CONSTRAINT [FK_LETTERDB11_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB11_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB11]'))
ALTER TABLE [dbo].[LETTERDB11]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB11_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB11_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB11]'))
ALTER TABLE [dbo].[LETTERDB11] CHECK CONSTRAINT [FK_LETTERDB11_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB12_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB12]'))
ALTER TABLE [dbo].[LETTERDB12]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB12_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB12_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB12]'))
ALTER TABLE [dbo].[LETTERDB12] CHECK CONSTRAINT [FK_LETTERDB12_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB12_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB12]'))
ALTER TABLE [dbo].[LETTERDB12]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB12_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB12_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB12]'))
ALTER TABLE [dbo].[LETTERDB12] CHECK CONSTRAINT [FK_LETTERDB12_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB13_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB13]'))
ALTER TABLE [dbo].[LETTERDB13]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB13_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB13_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB13]'))
ALTER TABLE [dbo].[LETTERDB13] CHECK CONSTRAINT [FK_LETTERDB13_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB13_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB13]'))
ALTER TABLE [dbo].[LETTERDB13]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB13_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB13_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB13]'))
ALTER TABLE [dbo].[LETTERDB13] CHECK CONSTRAINT [FK_LETTERDB13_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB14_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB14]'))
ALTER TABLE [dbo].[LETTERDB14]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB14_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB14_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB14]'))
ALTER TABLE [dbo].[LETTERDB14] CHECK CONSTRAINT [FK_LETTERDB14_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB14_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB14]'))
ALTER TABLE [dbo].[LETTERDB14]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB14_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB14_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB14]'))
ALTER TABLE [dbo].[LETTERDB14] CHECK CONSTRAINT [FK_LETTERDB14_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB15_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB15]'))
ALTER TABLE [dbo].[LETTERDB15]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB15_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB15_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB15]'))
ALTER TABLE [dbo].[LETTERDB15] CHECK CONSTRAINT [FK_LETTERDB15_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB15_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB15]'))
ALTER TABLE [dbo].[LETTERDB15]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB15_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB15_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB15]'))
ALTER TABLE [dbo].[LETTERDB15] CHECK CONSTRAINT [FK_LETTERDB15_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB2_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB2]'))
ALTER TABLE [dbo].[LETTERDB2]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB2_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB2_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB2]'))
ALTER TABLE [dbo].[LETTERDB2] CHECK CONSTRAINT [FK_LETTERDB2_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB2_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB2]'))
ALTER TABLE [dbo].[LETTERDB2]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB2_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB2_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB2]'))
ALTER TABLE [dbo].[LETTERDB2] CHECK CONSTRAINT [FK_LETTERDB2_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB3_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB3]'))
ALTER TABLE [dbo].[LETTERDB3]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB3_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB3_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB3]'))
ALTER TABLE [dbo].[LETTERDB3] CHECK CONSTRAINT [FK_LETTERDB3_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB3_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB3]'))
ALTER TABLE [dbo].[LETTERDB3]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB3_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB3_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB3]'))
ALTER TABLE [dbo].[LETTERDB3] CHECK CONSTRAINT [FK_LETTERDB3_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB4_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB4]'))
ALTER TABLE [dbo].[LETTERDB4]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB4_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB4_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB4]'))
ALTER TABLE [dbo].[LETTERDB4] CHECK CONSTRAINT [FK_LETTERDB4_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB4_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB4]'))
ALTER TABLE [dbo].[LETTERDB4]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB4_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB4_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB4]'))
ALTER TABLE [dbo].[LETTERDB4] CHECK CONSTRAINT [FK_LETTERDB4_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB5_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB5]'))
ALTER TABLE [dbo].[LETTERDB5]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB5_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB5_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB5]'))
ALTER TABLE [dbo].[LETTERDB5] CHECK CONSTRAINT [FK_LETTERDB5_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB5_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB5]'))
ALTER TABLE [dbo].[LETTERDB5]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB5_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB5_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB5]'))
ALTER TABLE [dbo].[LETTERDB5] CHECK CONSTRAINT [FK_LETTERDB5_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB6_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB6]'))
ALTER TABLE [dbo].[LETTERDB6]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB6_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB6_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB6]'))
ALTER TABLE [dbo].[LETTERDB6] CHECK CONSTRAINT [FK_LETTERDB6_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB6_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB6]'))
ALTER TABLE [dbo].[LETTERDB6]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB6_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB6_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB6]'))
ALTER TABLE [dbo].[LETTERDB6] CHECK CONSTRAINT [FK_LETTERDB6_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB7_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB7]'))
ALTER TABLE [dbo].[LETTERDB7]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB7_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB7_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB7]'))
ALTER TABLE [dbo].[LETTERDB7] CHECK CONSTRAINT [FK_LETTERDB7_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB7_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB7]'))
ALTER TABLE [dbo].[LETTERDB7]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB7_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB7_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB7]'))
ALTER TABLE [dbo].[LETTERDB7] CHECK CONSTRAINT [FK_LETTERDB7_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB8_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB8]'))
ALTER TABLE [dbo].[LETTERDB8]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB8_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB8_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB8]'))
ALTER TABLE [dbo].[LETTERDB8] CHECK CONSTRAINT [FK_LETTERDB8_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB8_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB8]'))
ALTER TABLE [dbo].[LETTERDB8]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB8_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB8_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB8]'))
ALTER TABLE [dbo].[LETTERDB8] CHECK CONSTRAINT [FK_LETTERDB8_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB9_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB9]'))
ALTER TABLE [dbo].[LETTERDB9]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB9_Charac0_Receiver] FOREIGN KEY([Receiver])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB9_Charac0_Receiver]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB9]'))
ALTER TABLE [dbo].[LETTERDB9] CHECK CONSTRAINT [FK_LETTERDB9_Charac0_Receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB9_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB9]'))
ALTER TABLE [dbo].[LETTERDB9]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB9_Charac0_Sender] FOREIGN KEY([Sender])
REFERENCES [dbo].[Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_LETTERDB9_Charac0_Sender]') AND parent_object_id = OBJECT_ID(N'[dbo].[LETTERDB9]'))
ALTER TABLE [dbo].[LETTERDB9] CHECK CONSTRAINT [FK_LETTERDB9_Charac0_Sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Post_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[Post]'))
ALTER TABLE [dbo].[Post]  WITH CHECK ADD  CONSTRAINT [FK_Post_Account] FOREIGN KEY([author])
REFERENCES [dbo].[Account] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Post_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[Post]'))
ALTER TABLE [dbo].[Post] CHECK CONSTRAINT [FK_Post_Account]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Post_PostCategory]') AND parent_object_id = OBJECT_ID(N'[dbo].[Post]'))
ALTER TABLE [dbo].[Post]  WITH CHECK ADD  CONSTRAINT [FK_Post_PostCategory] FOREIGN KEY([category_id])
REFERENCES [dbo].[PostCategory] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_Post_PostCategory]') AND parent_object_id = OBJECT_ID(N'[dbo].[Post]'))
ALTER TABLE [dbo].[Post] CHECK CONSTRAINT [FK_Post_PostCategory]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PostComment_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[PostComment]'))
ALTER TABLE [dbo].[PostComment]  WITH CHECK ADD  CONSTRAINT [FK_PostComment_Charac0] FOREIGN KEY([author])
REFERENCES [dbo].[Account] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PostComment_Charac0]') AND parent_object_id = OBJECT_ID(N'[dbo].[PostComment]'))
ALTER TABLE [dbo].[PostComment] CHECK CONSTRAINT [FK_PostComment_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PostComment_Post]') AND parent_object_id = OBJECT_ID(N'[dbo].[PostComment]'))
ALTER TABLE [dbo].[PostComment]  WITH CHECK ADD  CONSTRAINT [FK_PostComment_Post] FOREIGN KEY([post_id])
REFERENCES [dbo].[Post] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PostComment_Post]') AND parent_object_id = OBJECT_ID(N'[dbo].[PostComment]'))
ALTER TABLE [dbo].[PostComment] CHECK CONSTRAINT [FK_PostComment_Post]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_RcvResult_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[RcvResult]'))
ALTER TABLE [dbo].[RcvResult]  WITH CHECK ADD  CONSTRAINT [FK_RcvResult_Account] FOREIGN KEY([AccountName])
REFERENCES [dbo].[Account] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_RcvResult_Account]') AND parent_object_id = OBJECT_ID(N'[dbo].[RcvResult]'))
ALTER TABLE [dbo].[RcvResult] CHECK CONSTRAINT [FK_RcvResult_Account]
GO
IF NOT EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Account_alphabet]') AND parent_object_id = OBJECT_ID(N'[dbo].[Account]'))
ALTER TABLE [dbo].[Account]  WITH CHECK ADD  CONSTRAINT [CK_Account_alphabet] CHECK  ((NOT [c_id] like '%[^A-Za-z0-9]%'))
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Account_alphabet]') AND parent_object_id = OBJECT_ID(N'[dbo].[Account]'))
ALTER TABLE [dbo].[Account] CHECK CONSTRAINT [CK_Account_alphabet]
GO
IF NOT EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[ck_No_Special_Characters]') AND parent_object_id = OBJECT_ID(N'[dbo].[Charac0]'))
ALTER TABLE [dbo].[Charac0]  WITH NOCHECK ADD  CONSTRAINT [ck_No_Special_Characters] CHECK  ((NOT [c_id] like '%[^A-Za-z0-9]%'))
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[ck_No_Special_Characters]') AND parent_object_id = OBJECT_ID(N'[dbo].[Charac0]'))
ALTER TABLE [dbo].[Charac0] CHECK CONSTRAINT [ck_No_Special_Characters]
GO
IF NOT EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Hstable]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSTABLE]'))
ALTER TABLE [dbo].[HSTABLE]  WITH CHECK ADD  CONSTRAINT [CK_Hstable] CHECK  ((NOT [HSName] like '%[^A-Za-z0-9]%'))
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Hstable]') AND parent_object_id = OBJECT_ID(N'[dbo].[HSTABLE]'))
ALTER TABLE [dbo].[HSTABLE] CHECK CONSTRAINT [CK_Hstable]
GO
/****** Object:  Trigger [dbo].[tr_charac0]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[tr_charac0]'))
EXEC dbo.sp_executesql @statement = N'CREATE TRIGGER [dbo].[tr_charac0]
   ON  [dbo].[Charac0]
   AFTER INSERT
AS 

IF EXISTS (SELECT c_id FROM inserted WHERE (c_id LIKE ''%ƒ%'') OR (c_id LIKE ''%„%'') OR (c_id LIKE ''%…%'') OR (c_id LIKE ''%†%'') OR (c_id LIKE ''%‡%'') OR (c_id LIKE ''%ˆ%'') OR (c_id LIKE ''%‰%'') OR (c_id LIKE ''%Š%'') OR (c_id LIKE ''%‹%'') OR (c_id LIKE ''%Œ%'') OR (c_id LIKE ''%%'') OR (c_id LIKE ''%Ž%'') OR (c_id LIKE ''%%'') OR (c_id LIKE ''%%'') OR (c_id LIKE ''%‘%'') OR (c_id LIKE ''%’%'') OR (c_id LIKE ''%“%'') OR (c_id LIKE ''%”%'') OR (c_id LIKE ''%•%'') OR (c_id LIKE ''%–%'') OR (c_id LIKE ''%—%'') OR (c_id LIKE ''%˜%'') OR (c_id LIKE ''%™%'') OR (c_id LIKE ''%š%'') OR (c_id LIKE ''%›%'') OR (c_id LIKE ''%œ%'') OR (c_id LIKE ''%%'') OR (c_id LIKE ''%ž%'') OR (c_id LIKE ''%Ÿ%'') OR (c_id LIKE ''% %'') OR (c_id LIKE ''%¡%'') OR (c_id LIKE ''%¢%'') OR (c_id LIKE ''%£%'') OR (c_id LIKE ''%¤%'') OR (c_id LIKE ''%¥%'') OR (c_id LIKE ''%¦%'') OR (c_id LIKE ''%§%'') OR (c_id LIKE ''%¨%'') OR (c_id LIKE ''%©%'') OR (c_id LIKE ''%ª%'') OR (c_id LIKE ''%«%'') OR (c_id LIKE ''%¬%'') OR (c_id LIKE ''%­%'') OR (c_id LIKE ''%®%'') OR (c_id LIKE ''%¯%'') OR (c_id LIKE ''%°%'') OR (c_id LIKE ''%±%'') OR (c_id LIKE ''%²%'') OR (c_id LIKE ''%³%'') OR (c_id LIKE ''%´%'') OR (c_id LIKE ''%µ%'') OR (c_id LIKE ''%¶%'') OR (c_id LIKE ''%·%'') OR (c_id LIKE ''%¸%'') OR (c_id LIKE ''%¹%'') OR (c_id LIKE ''%º%'') OR (c_id LIKE ''%»%'') OR (c_id LIKE ''%ü%'') OR (c_id LIKE ''%½%'') OR (c_id LIKE ''%¾%'') OR (c_id LIKE ''%¿%'') OR (c_id LIKE ''%À%'') OR (c_id LIKE ''%Á%'') OR (c_id LIKE ''%Â%'') OR (c_id LIKE ''%Ã%'') OR (c_id LIKE ''%Ä%'') OR (c_id LIKE ''%Å%'') OR (c_id LIKE ''%Æ%'') OR (c_id LIKE ''%Ç%'') OR (c_id LIKE ''%È%'') OR (c_id LIKE ''%É%'') OR (c_id LIKE ''%Ê%'') OR (c_id LIKE ''%Ë%'') OR (c_id LIKE ''%Ì%'') OR (c_id LIKE ''%Í%'') OR (c_id LIKE ''%Î%'') OR (c_id LIKE ''%Ï%'') OR (c_id LIKE ''%Ð%'') OR (c_id LIKE ''%Ñ%'') OR (c_id LIKE ''%Ò%'') OR (c_id LIKE ''%Ó%'') OR (c_id LIKE ''%Ô%'') OR (c_id LIKE ''%Õ%'') OR (c_id LIKE ''%Ö%'') OR (c_id LIKE ''%×%'') OR (c_id LIKE ''%Ø%'') OR (c_id LIKE ''%Ù%'') OR (c_id LIKE ''%Ú%'') OR (c_id LIKE ''%Û%'') OR (c_id LIKE ''%Ü%'') OR (c_id LIKE ''%Ý%'') OR (c_id LIKE ''%Þ%'') OR (c_id LIKE ''%ß%'') OR (c_id LIKE ''%à%'') OR (c_id LIKE ''%á%'') OR (c_id LIKE ''%â%'') OR (c_id LIKE ''%ã%'') OR (c_id LIKE ''%ä%'') OR (c_id LIKE ''%å%'') OR (c_id LIKE ''%æ%'') OR (c_id LIKE ''%ç%'') OR (c_id LIKE ''%è%'') OR (c_id LIKE ''%é%'') OR (c_id LIKE ''%ê%'') OR (c_id LIKE ''%ë%'') OR (c_id LIKE ''%ì%'') OR (c_id LIKE ''%í%'') OR (c_id LIKE ''%î%'') OR (c_id LIKE ''%ï%'') OR (c_id LIKE ''%ð%'') OR (c_id LIKE ''%ñ%'') OR (c_id LIKE ''%ò%'') OR (c_id LIKE ''%ó%'') OR (c_id LIKE ''%ô%'') OR (c_id LIKE ''%õ%'') OR (c_id LIKE ''%ö%'') OR (c_id LIKE ''%÷%'') OR (c_id LIKE ''%ø%'') OR (c_id LIKE ''%ù%'') OR (c_id LIKE ''%ú%'') OR (c_id LIKE ''%û%'') OR (c_id LIKE ''%ü%'') OR (c_id LIKE ''%ý%'') OR (c_id LIKE ''%þ%'') OR (c_id LIKE ''%ÿ%''))

BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for trigger here

--	UPDATE charac0
--	Set c_status = ''X''
--	WHERE (c_id LIKE ''%ƒ%'') OR (c_id LIKE ''%„%'') OR (c_id LIKE ''%…%'') OR (c_id LIKE ''%†%'') OR (c_id LIKE ''%‡%'') OR (c_id LIKE ''%ˆ%'') OR (c_id LIKE ''%‰%'') OR (c_id LIKE ''%Š%'') OR (c_id LIKE ''%‹%'') OR (c_id LIKE ''%Œ%'') OR (c_id LIKE ''%%'') OR (c_id LIKE ''%Ž%'') OR (c_id LIKE ''%%'') OR (c_id LIKE ''%%'') OR (c_id LIKE ''%‘%'') OR (c_id LIKE ''%’%'') OR (c_id LIKE ''%“%'') OR (c_id LIKE ''%”%'') OR (c_id LIKE ''%•%'') OR (c_id LIKE ''%–%'') OR (c_id LIKE ''%—%'') OR (c_id LIKE ''%˜%'') OR (c_id LIKE ''%™%'') OR (c_id LIKE ''%š%'') OR (c_id LIKE ''%›%'') OR (c_id LIKE ''%œ%'') OR (c_id LIKE ''%%'') OR (c_id LIKE ''%ž%'') OR (c_id LIKE ''%Ÿ%'') OR (c_id LIKE ''% %'') OR (c_id LIKE ''%¡%'') OR (c_id LIKE ''%¢%'') OR (c_id LIKE ''%£%'') OR (c_id LIKE ''%¤%'') OR (c_id LIKE ''%¥%'') OR (c_id LIKE ''%¦%'') OR (c_id LIKE ''%§%'') OR (c_id LIKE ''%¨%'') OR (c_id LIKE ''%©%'') OR (c_id LIKE ''%ª%'') OR (c_id LIKE ''%«%'') OR (c_id LIKE ''%¬%'') OR (c_id LIKE ''%­%'') OR (c_id LIKE ''%®%'') OR (c_id LIKE ''%¯%'') OR (c_id LIKE ''%°%'') OR (c_id LIKE ''%±%'') OR (c_id LIKE ''%²%'') OR (c_id LIKE ''%³%'') OR (c_id LIKE ''%´%'') OR (c_id LIKE ''%µ%'') OR (c_id LIKE ''%¶%'') OR (c_id LIKE ''%·%'') OR (c_id LIKE ''%¸%'') OR (c_id LIKE ''%¹%'') OR (c_id LIKE ''%º%'') OR (c_id LIKE ''%»%'') OR (c_id LIKE ''%ü%'') OR (c_id LIKE ''%½%'') OR (c_id LIKE ''%¾%'') OR (c_id LIKE ''%¿%'') OR (c_id LIKE ''%À%'') OR (c_id LIKE ''%Á%'') OR (c_id LIKE ''%Â%'') OR (c_id LIKE ''%Ã%'') OR (c_id LIKE ''%Ä%'') OR (c_id LIKE ''%Å%'') OR (c_id LIKE ''%Æ%'') OR (c_id LIKE ''%Ç%'') OR (c_id LIKE ''%È%'') OR (c_id LIKE ''%É%'') OR (c_id LIKE ''%Ê%'') OR (c_id LIKE ''%Ë%'') OR (c_id LIKE ''%Ì%'') OR (c_id LIKE ''%Í%'') OR (c_id LIKE ''%Î%'') OR (c_id LIKE ''%Ï%'') OR (c_id LIKE ''%Ð%'') OR (c_id LIKE ''%Ñ%'') OR (c_id LIKE ''%Ò%'') OR (c_id LIKE ''%Ó%'') OR (c_id LIKE ''%Ô%'') OR (c_id LIKE ''%Õ%'') OR (c_id LIKE ''%Ö%'') OR (c_id LIKE ''%×%'') OR (c_id LIKE ''%Ø%'') OR (c_id LIKE ''%Ù%'') OR (c_id LIKE ''%Ú%'') OR (c_id LIKE ''%Û%'') OR (c_id LIKE ''%Ü%'') OR (c_id LIKE ''%Ý%'') OR (c_id LIKE ''%Þ%'') OR (c_id LIKE ''%ß%'') OR (c_id LIKE ''%à%'') OR (c_id LIKE ''%á%'') OR (c_id LIKE ''%â%'') OR (c_id LIKE ''%ã%'') OR (c_id LIKE ''%ä%'') OR (c_id LIKE ''%å%'') OR (c_id LIKE ''%æ%'') OR (c_id LIKE ''%ç%'') OR (c_id LIKE ''%è%'') OR (c_id LIKE ''%é%'') OR (c_id LIKE ''%ê%'') OR (c_id LIKE ''%ë%'') OR (c_id LIKE ''%ì%'') OR (c_id LIKE ''%í%'') OR (c_id LIKE ''%î%'') OR (c_id LIKE ''%ï%'') OR (c_id LIKE ''%ð%'') OR (c_id LIKE ''%ñ%'') OR (c_id LIKE ''%ò%'') OR (c_id LIKE ''%ó%'') OR (c_id LIKE ''%ô%'') OR (c_id LIKE ''%õ%'') OR (c_id LIKE ''%ö%'') OR (c_id LIKE ''%÷%'') OR (c_id LIKE ''%ø%'') OR (c_id LIKE ''%ù%'') OR (c_id LIKE ''%ú%'') OR (c_id LIKE ''%û%'') OR (c_id LIKE ''%ü%'') OR (c_id LIKE ''%ý%'') OR (c_id LIKE ''%þ%'') OR (c_id LIKE ''%ÿ%'')

END
' 
GO
/****** Object:  Trigger [dbo].[tr_HSTABLE_delete_data_MERC_UPDATE]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[tr_HSTABLE_delete_data_MERC_UPDATE]'))
EXEC dbo.sp_executesql @statement = N'CREATE TRIGGER [dbo].[tr_HSTABLE_delete_data_MERC_UPDATE] ON  [dbo].[HSTABLE] FOR UPDATE
AS BEGIN
	SET NOCOUNT ON;
IF UPDATE (DelDate)
BEGIN
DECLARE @HSID int
DECLARE @MasterName varchar(50)

-- IF EXISTS (SELECT * FROM inserted)

Set @HSID = (select HSID FROM inserted)
Set @MasterName = (select MasterName FROM inserted)

BEGIN
	SET NOCOUNT ON;
 DELETE FROM dbo.HS WHERE HSID = @HSID AND MasterName = @MasterName
END
END
END
-- ###############################################################################################

-- ALTER TRIGGER [dbo].[tr_SCHEDULE_Modified]
--    ON [dbo].[SCHEDULE]
--    AFTER UPDATE
-- AS BEGIN
--     SET NOCOUNT ON;
--     IF UPDATE (QtyToRepair) 
--     BEGIN
--         UPDATE SCHEDULE 
--         SET modified = GETDATE()
--            , ModifiedUser = SUSER_NAME()
--            , ModifiedHost = HOST_NAME()
--         FROM SCHEDULE S INNER JOIN Inserted I 
--         ON S.OrderNo = I.OrderNo and S.PartNumber = I.PartNumber
--         WHERE S.QtyToRepair <> I.QtyToRepair
--     END 
-- END' 
GO
/****** Object:  Trigger [dbo].[tr_HSTABLE_INSERT]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[tr_HSTABLE_INSERT]'))
EXEC dbo.sp_executesql @statement = N'
CREATE TRIGGER [dbo].[tr_HSTABLE_INSERT]
   ON  [dbo].[HSTABLE]
   FOR INSERT
AS 

DECLARE @HSID int
DECLARE @HSName varchar(50)
DECLARE @MasterName varchar(50)
DECLARE @Type int
DECLARE @HSLevel int

IF EXISTS (SELECT * FROM inserted)

Set @HSID = (SELECT HSID FROM inserted)
Set @HSName = (select HSName from inserted)
Set @MasterName = (select MasterName from inserted)
Set @Type = (select Type from inserted)
Set @HSLevel = (select HSLevel from inserted)

BEGIN
INSERT INTO dbo.HS(HSID, HSName, MasterName, [Type], HSLevel, rb, reset_rb) values (@HSID, @HSName, @MasterName, @Type, @HSLevel, ''0'', ''0'')
END
' 
GO
/****** Object:  Trigger [dbo].[tr_HSTABLE_UPDATE_LEVEL_MERC]    Script Date: 15/6/2020 1:32:58 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[tr_HSTABLE_UPDATE_LEVEL_MERC]'))
EXEC dbo.sp_executesql @statement = N'
CREATE TRIGGER [dbo].[tr_HSTABLE_UPDATE_LEVEL_MERC] ON  [dbo].[HSTABLE] FOR UPDATE
AS 
IF UPDATE (HSLevel)

DECLARE @HSID int
DECLARE @HSLevel int

-- IF EXISTS (SELECT * FROM inserted)

Set @HSID = (select HSID FROM inserted)
Set @HSLevel = (select HSLevel FROM inserted)

BEGIN
	SET NOCOUNT ON;
UPDATE dbo.HS SET HSLevel = @HSLevel WHERE HSID = @HSID
END' 
GO
USE [master]
GO
ALTER DATABASE [ASD] SET  READ_WRITE 
GO
