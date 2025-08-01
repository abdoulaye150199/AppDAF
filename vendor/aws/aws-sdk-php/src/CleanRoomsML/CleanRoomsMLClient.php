<?php
namespace Aws\CleanRoomsML;

use Aws\AwsClient;

/**
 * This client is used to interact with the **cleanrooms-ml** service.
 * @method \Aws\Result cancelTrainedModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTrainedModelAsync(array $args = [])
 * @method \Aws\Result cancelTrainedModelInferenceJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTrainedModelInferenceJobAsync(array $args = [])
 * @method \Aws\Result createAudienceModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAudienceModelAsync(array $args = [])
 * @method \Aws\Result createConfiguredAudienceModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredAudienceModelAsync(array $args = [])
 * @method \Aws\Result createConfiguredModelAlgorithm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredModelAlgorithmAsync(array $args = [])
 * @method \Aws\Result createConfiguredModelAlgorithmAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredModelAlgorithmAssociationAsync(array $args = [])
 * @method \Aws\Result createMLInputChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMLInputChannelAsync(array $args = [])
 * @method \Aws\Result createTrainedModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrainedModelAsync(array $args = [])
 * @method \Aws\Result createTrainingDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrainingDatasetAsync(array $args = [])
 * @method \Aws\Result deleteAudienceGenerationJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAudienceGenerationJobAsync(array $args = [])
 * @method \Aws\Result deleteAudienceModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAudienceModelAsync(array $args = [])
 * @method \Aws\Result deleteConfiguredAudienceModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredAudienceModelAsync(array $args = [])
 * @method \Aws\Result deleteConfiguredAudienceModelPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredAudienceModelPolicyAsync(array $args = [])
 * @method \Aws\Result deleteConfiguredModelAlgorithm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredModelAlgorithmAsync(array $args = [])
 * @method \Aws\Result deleteConfiguredModelAlgorithmAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredModelAlgorithmAssociationAsync(array $args = [])
 * @method \Aws\Result deleteMLConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMLConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteMLInputChannelData(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMLInputChannelDataAsync(array $args = [])
 * @method \Aws\Result deleteTrainedModelOutput(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrainedModelOutputAsync(array $args = [])
 * @method \Aws\Result deleteTrainingDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrainingDatasetAsync(array $args = [])
 * @method \Aws\Result getAudienceGenerationJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAudienceGenerationJobAsync(array $args = [])
 * @method \Aws\Result getAudienceModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAudienceModelAsync(array $args = [])
 * @method \Aws\Result getCollaborationConfiguredModelAlgorithmAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationConfiguredModelAlgorithmAssociationAsync(array $args = [])
 * @method \Aws\Result getCollaborationMLInputChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationMLInputChannelAsync(array $args = [])
 * @method \Aws\Result getCollaborationTrainedModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationTrainedModelAsync(array $args = [])
 * @method \Aws\Result getConfiguredAudienceModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredAudienceModelAsync(array $args = [])
 * @method \Aws\Result getConfiguredAudienceModelPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredAudienceModelPolicyAsync(array $args = [])
 * @method \Aws\Result getConfiguredModelAlgorithm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredModelAlgorithmAsync(array $args = [])
 * @method \Aws\Result getConfiguredModelAlgorithmAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredModelAlgorithmAssociationAsync(array $args = [])
 * @method \Aws\Result getMLConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLConfigurationAsync(array $args = [])
 * @method \Aws\Result getMLInputChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLInputChannelAsync(array $args = [])
 * @method \Aws\Result getTrainedModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrainedModelAsync(array $args = [])
 * @method \Aws\Result getTrainedModelInferenceJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrainedModelInferenceJobAsync(array $args = [])
 * @method \Aws\Result getTrainingDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrainingDatasetAsync(array $args = [])
 * @method \Aws\Result listAudienceExportJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAudienceExportJobsAsync(array $args = [])
 * @method \Aws\Result listAudienceGenerationJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAudienceGenerationJobsAsync(array $args = [])
 * @method \Aws\Result listAudienceModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAudienceModelsAsync(array $args = [])
 * @method \Aws\Result listCollaborationConfiguredModelAlgorithmAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationConfiguredModelAlgorithmAssociationsAsync(array $args = [])
 * @method \Aws\Result listCollaborationMLInputChannels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationMLInputChannelsAsync(array $args = [])
 * @method \Aws\Result listCollaborationTrainedModelExportJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelExportJobsAsync(array $args = [])
 * @method \Aws\Result listCollaborationTrainedModelInferenceJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelInferenceJobsAsync(array $args = [])
 * @method \Aws\Result listCollaborationTrainedModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelsAsync(array $args = [])
 * @method \Aws\Result listConfiguredAudienceModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredAudienceModelsAsync(array $args = [])
 * @method \Aws\Result listConfiguredModelAlgorithmAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredModelAlgorithmAssociationsAsync(array $args = [])
 * @method \Aws\Result listConfiguredModelAlgorithms(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredModelAlgorithmsAsync(array $args = [])
 * @method \Aws\Result listMLInputChannels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listMLInputChannelsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listTrainedModelInferenceJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainedModelInferenceJobsAsync(array $args = [])
 * @method \Aws\Result listTrainedModelVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainedModelVersionsAsync(array $args = [])
 * @method \Aws\Result listTrainedModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainedModelsAsync(array $args = [])
 * @method \Aws\Result listTrainingDatasets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainingDatasetsAsync(array $args = [])
 * @method \Aws\Result putConfiguredAudienceModelPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfiguredAudienceModelPolicyAsync(array $args = [])
 * @method \Aws\Result putMLConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putMLConfigurationAsync(array $args = [])
 * @method \Aws\Result startAudienceExportJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startAudienceExportJobAsync(array $args = [])
 * @method \Aws\Result startAudienceGenerationJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startAudienceGenerationJobAsync(array $args = [])
 * @method \Aws\Result startTrainedModelExportJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startTrainedModelExportJobAsync(array $args = [])
 * @method \Aws\Result startTrainedModelInferenceJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startTrainedModelInferenceJobAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateConfiguredAudienceModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfiguredAudienceModelAsync(array $args = [])
 */
class CleanRoomsMLClient extends AwsClient {}
